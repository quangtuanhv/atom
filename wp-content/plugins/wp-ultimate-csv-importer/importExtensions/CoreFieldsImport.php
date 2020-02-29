<?php
/******************************************************************************************
 * Copyright (C) Smackcoders. - All Rights Reserved under Smackcoders Proprietary License
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * You can contact Smackcoders at email address info@smackcoders.com.
 *******************************************************************************************/

namespace Smackcoders\FCSV;

if ( ! defined( 'ABSPATH' ) )
exit; // Exit if accessed directly

class CoreFieldsImport {
	private static $core_instance = null,$media_instance;
	public $detailed_log;
	public static function getInstance() {

		if (CoreFieldsImport::$core_instance == null) {
			CoreFieldsImport::$core_instance = new CoreFieldsImport;
			CoreFieldsImport::$media_instance = new MediaHandling;
			return CoreFieldsImport::$core_instance;
		}
		return CoreFieldsImport::$core_instance;
	}

	function set_core_values($header_array ,$value_array , $map , $type , $mode , $line_number , $check , $hash_key){

		global $wpdb;
		global $uci_woocomm_instance;
		global $userimp_class;
		$helpers_instance = ImportHelpers::getInstance();
		CoreFieldsImport::$media_instance->header_array = $header_array;
		CoreFieldsImport::$media_instance->value_array = $value_array;
		$log_table_name = $wpdb->prefix ."import_detail_log";
		$importlog_table_name = $wpdb->prefix ."import_log_detail";

		$taxonomies = get_taxonomies();
		if (in_array($type, $taxonomies)) {
			$import_type = $type;
			if($import_type == 'category' || $import_type == 'product_category' || $import_type == 'product_cat' || $import_type == 'wpsc_product_category' || $import_type == 'event-categories'):
				$type = 'Categories';
			elseif($import_type == 'product_tag' || $import_type == 'event-tags' || $import_type == 'post_tag'):
				$type = 'Tags';
			else:
				$type = 'Taxonomies';
			endif;
		}

		if(($type == 'WooCommerce Product') || ($type == 'Categories') || ($type == 'Tags') || ($type == 'Taxonomies') || ($type == 'Comments') || ($type == 'Users') || ($type == 'Customer Reviews') ){

			$comments_instance = CommentsImport::getInstance();
			$customer_reviews_instance = CustomerReviewsImport::getInstance();

			$post_values = [];
			$post_values = $helpers_instance->get_header_values($map , $header_array , $value_array);
			if($type == 'WooCommerce Product'){
				$result = $uci_woocomm_instance->woocommerce_product_import($post_values , $mode , $check , $hash_key , $line_number);
			}

			if($type == 'Users'){
				$result = $userimp_class->users_import_function($post_values , $mode ,$hash_key , $line_number);
			}
			if($type == 'Comments'){
				$result = $comments_instance->comments_import_function($post_values , $mode ,$hash_key , $line_number);
			}
			if($type == 'Customer Reviews'){
				$result = $customer_reviews_instance->customer_reviews_import($post_values , $mode , $check ,$hash_key , $line_number);
			}

			$last_import_id = isset($result['ID']) ? $result['ID'] : '';
			$post_id = $result['ID'];

			$helpers_instance->get_post_ids($post_id ,$hash_key);

			if(isset($post_values['featured_image'])) {	
				if ( preg_match_all( '/\b[-A-Z0-9+&@#\/%=~_|$?!:,.]*[A-Z0-9+&@#\/%=~_|$]/i', $post_values['featured_image'], $matchedlist, PREG_PATTERN_ORDER ) ) {	
					$image_type = 'Featured';		
					$attach_id = CoreFieldsImport::$media_instance->media_handling( $post_values['featured_image'] , $post_id ,$post_values,$type,$image_type,$hash_key,$header_array,$value_array);	
				}
			}	

			if(preg_match("(Can't|Skipped|Duplicate)", $this->detailed_log[$line_number]['Message']) === 0) {  
				if ( $type == 'WooCommerce Product') {
					if ( ! isset( $post_values['post_title'] ) ) {
						$post_values['post_title'] = '';
					}
					$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . get_permalink( $post_id ) . "' target='_blank' title='" . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $post_values['post_title'] ) ) . "'rel='permalink'>Web View</a> | <a href='" . get_edit_post_link( $post_id, true ) . "'target='_blank' title='" . esc_attr( 'Edit this item' ) . "'>Admin View</a>";
				}
				elseif( $type == 'Users'){
					$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . get_edit_user_link( $post_id , true ) . "' target='_blank' title='" . esc_attr( 'Edit this item' ) . "'> User Profile </a>";
				}
				else{
					$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . get_permalink( $post_id ) . "' target='_blank' title='" . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $post_values['post_title'] ) ) . "'rel='permalink'>Web View</a> | <a href='" . get_edit_post_link( $post_id, true ) . "'target='_blank' title='" . esc_attr( 'Edit this item' ) . "'>Admin View</a>";
				}
				if(isset($post_values['post_status'])){
					$this->detailed_log[$line_number]['  Status'] = $post_values['post_status'];
				}	
			}

			return $post_id;

		}
		else{

			$post_values = [];

			foreach($map as $key => $value){
				$csv_value= trim($map[$key]);
				$extension_object = new ExtensionHandler;
				$import_type = $extension_object->import_type_as($type);
				$import_as = $extension_object->import_post_types($import_type );
				if(!empty($csv_value)){
					$pattern = "/({([a-z A-Z 0-9 | , _ -]+)(.*?)(}))/";
					if(preg_match_all($pattern, $csv_value, $matches, PREG_PATTERN_ORDER)){	
						$csv_element = $csv_value;
						foreach($matches[2] as $value){
							$get_key = array_search($value , $header_array);
							if(isset($value_array[$get_key])){
								$csv_value_element = $value_array[$get_key];	
								$value = '{'.$value.'}';
								$csv_element = str_replace($value, $csv_value_element, $csv_element);
							}
							
						}

						$math = 'MATH(';
							if (strpos($csv_element, $math) !== false) {	
								$equation = str_replace('MATH(', '', $csv_element);
								$equation = str_replace(')', '', $equation);
								$csv_element = $helpers_instance->evalmath($equation);
							}

								$wp_element= trim($key);
								if(!empty($csv_element) && !empty($wp_element)){
									$post_values[$wp_element] = $csv_element;
									$post_values['post_type'] = $import_as;
									$post_values = $this->import_core_fields($post_values);
								}
					}
					
					elseif(!in_array($csv_value , $header_array)){
						$wp_element= trim($key);
						$post_values[$wp_element] = $csv_value;
						$post_values['post_type'] = $import_as;
					}
					
					else{
						$get_key= array_search($csv_value , $header_array);
						if(isset($value_array[$get_key])){
							$csv_element = $value_array[$get_key];	
							$wp_element= trim($key);
							$extension_object = new ExtensionHandler;
							$import_type = $extension_object->import_type_as($type);
							$import_as = $extension_object->import_post_types($import_type );

							if(!empty($csv_element) && !empty($wp_element)){
								$post_values[$wp_element] = $csv_element;
								$post_values['post_type'] = $import_as;
								$post_values = $this->import_core_fields($post_values);

								if($import_as == 'page'){
									if(isset($post_values['post_parent'])){
										if(!is_numeric($post_values['post_parent'])){
											$post_parent_title = $post_values['post_parent'];
											$post_parent_id = $wpdb->get_var("SELECT ID FROM {$wpdb->prefix}posts WHERE post_title = '$post_parent_title' AND post_type = 'page'");
											$post_values['post_parent'] = $post_parent_id;
										}
									}
								}
							}
						}
					}
				}
			}
			
			if($check == 'ID'){	
				$ID = $post_values['ID'];	
				$get_result =  $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE ID = '$ID' AND post_type = '$import_as' AND post_status != 'trash' order by ID DESC ");			
			}
			if($check == 'post_title'){
				$title = $post_values['post_title'];
				$title = $wpdb->_real_escape($title);
				$get_result =  $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_title = '$title' AND post_type = '$import_as' AND post_status != 'trash' order by ID DESC ");		
			}
			if($check == 'post_name'){
				$name = $post_values['post_name'];
				$get_result =  $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_name = '$name' AND post_type = '$import_as' AND post_status != 'trash' order by ID DESC ");	
			}
			if($check == 'post_content'){
				$content = $post_values['post_content'];
				$get_result =  $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_content = '$content' AND post_type = '$import_as' AND post_status != 'trash' order by ID DESC ");	
			}

			$updated_row_counts = $helpers_instance->update_count($hash_key);
			$created_count = $updated_row_counts['created'];
			$updated_count = $updated_row_counts['updated'];
			$skipped_count = $updated_row_counts['skipped'];

			if($mode == 'Insert'){

				if (is_array($get_result) && !empty($get_result)) {
					$fields = $wpdb->get_results("UPDATE $log_table_name SET skipped = $skipped_count WHERE hash_key = '$hash_key'");
					$this->detailed_log[$line_number]['Message'] =  "Skipped, Due to duplicate found!.";
				}else{

					$post_format=trim($post_values['post_format'],"post-format-");
					$post_id = wp_insert_post($post_values);
					if($post_format == 'vide'){
						$post_format = 'video';
					}
					set_post_format($post_id , $post_format);
					$fields = $wpdb->get_results("UPDATE $log_table_name SET created = $created_count WHERE hash_key = '$hash_key'");

					if(is_wp_error($post_id) || $post_id == '') {
						if(is_wp_error($post_id)) {
							$this->detailed_log[$line_number]['Message'] = "Can't insert this " . $post_values['post_type'] . ". " . $post_id->get_error_message();
						}
						else {
							$this->detailed_log[$line_number]['Message'] =  "Can't insert this " . $post_values['post_type'];
						}
						$fields = $wpdb->get_results("UPDATE $log_table_name SET skipped = $skipped_count WHERE hash_key = '$hash_key'");
					}	
					else{
						$this->detailed_log[$line_number]['Message'] = 'Inserted ' . $post_values['post_type'] . ' ID: ' . $post_id . ', ' . $post_values['specific_author'];
					}
				}
			}

			if($mode == 'Update'){
				if (is_array($get_result) && !empty($get_result)) {

					$post_id = $get_result[0]->ID;	
					$post_values['ID'] = $post_id;
					wp_update_post($post_values);
					$post_format=trim($post_values['post_format'],"post-format-");
					if($post_format == 'vide'){
						$post_format = 'video';
					}
					set_post_format($post_id , $post_format);	
					$fields = $wpdb->get_results("UPDATE $log_table_name SET updated = $updated_count WHERE hash_key = '$hash_key'");
					$this->detailed_log[$line_number]['Message'] = 'Updated' . $post_values['post_type'] . ' ID: ' . $post_id . ', ' . $post_values['specific_author'];
				}else{

					unset($post_values['ID']);
					$post_id = wp_insert_post($post_values);
					$post_format=trim($post_values['post_format'],"post-format-");
					if($post_format == 'vide'){
						$post_format = 'video';
					}
					set_post_format($post_id , $post_format);
					$fields = $wpdb->get_results("UPDATE $log_table_name SET created = $created_count WHERE hash_key = '$hash_key'");
					if(is_wp_error($post_id) || $post_id == '') {
						if(is_wp_error($post_id)) {
							$this->detailed_log[$line_number]['Message'] = "Can't insert this " . $post_values['post_type'] . ". " . $post_id->get_error_message();
						}
						else {
							$this->detailed_log[$line_number]['Message'] =  "Can't insert this " . $post_values['post_type'];
						}
						$fields = $wpdb->get_results("UPDATE $log_table_name SET skipped = $skipped_count WHERE hash_key = '$hash_key'");
					}
					else{
						$this->detailed_log[$line_number]['Message'] = 'Inserted ' . $post_values['post_type'] . ' ID: ' . $post_id . ', ' . $post_values['specific_author'];
					}
				}
			}
			
			if(preg_match("(Can't|Skipped|Duplicate)", $this->detailed_log[$line_number]['Message']) === 0) {  
				if ( $type == 'Posts' || $type == 'CustomPosts' || $type == 'Pages') {
					if ( ! isset( $post_values['post_title'] ) ) {
						$post_values['post_title'] = '';
					}
					$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . get_permalink( $post_id ) . "' target='_blank' title='" . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $post_values['post_title'] ) ) . "'rel='permalink'>Web View</a> | <a href='" . get_edit_post_link( $post_id, true ) . "'target='_blank' title='" . esc_attr( 'Edit this item' ) . "'>Admin View</a>";
				}
				else{
					$this->detailed_log[$line_number]['VERIFY'] = "<b> Click here to verify</b> - <a href='" . get_permalink( $post_id ) . "' target='_blank' title='" . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $post_values['post_title'] ) ) . "'rel='permalink'>Web View</a> | <a href='" . get_edit_post_link( $post_id, true ) . "'target='_blank' title='" . esc_attr( 'Edit this item' ) . "'>Admin View</a>";
				}
				$this->detailed_log[$line_number]['  Status'] = $post_values['post_status'];
			}

			if(isset($post_values['featured_image'])) {
				if ( preg_match_all( '/\b[-A-Z0-9+&@#\/%=~_|$?!:,.]*[A-Z0-9+&@#\/%=~_|$]/i', $post_values['featured_image'], $matchedlist, PREG_PATTERN_ORDER ) ) {	
					$image_type = 'Featured';		
					$attach_id = CoreFieldsImport::$media_instance->media_handling( $post_values['featured_image'] , $post_id ,$post_values,$type,$image_type,$hash_key,$header_array,$value_array);	
				}
			}
	
			return $post_id;
		}
	}


	function import_core_fields($data_array){
		$helpers_instance = ImportHelpers::getInstance();

		if(!isset( $data_array['post_date'] )) {
			$data_array['post_date'] = current_time('Y-m-d H:i:s');
		} else {
			if(strtotime( $data_array['post_date'] )) {
				$data_array['post_date'] = date( 'Y-m-d H:i:s', strtotime( $data_array['post_date'] ) );
			} else {
				$data_array['post_date'] = current_time('Y-m-d H:i:s');
			}
		}

		if(!isset($data_array['post_author'])) {
			$data_array['post_author'] = 1;
		} else {
			if(isset( $data_array['post_author'] )) {
				$user_records = $helpers_instance->get_from_user_details( $data_array['post_author'] );
				$data_array['post_author'] = $user_records['user_id'];
				$data_array['specific_author'] = $user_records['message'];
			}
		}
		if ( !empty($data_array['post_status']) ) {
			$data_array = $helpers_instance->assign_post_status( $data_array );
		}else{
			$data_array['post_status'] = 'publish';
		}

		return $data_array;
	}

}
