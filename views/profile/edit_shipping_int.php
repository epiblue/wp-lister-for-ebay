

							<!-- flat international shipping services table -->
							<table id="int_shipping_options_table_flat" class="service_table_flat service_table" style="">
								
								<tr>
									<th>
										<?php echo __('Destination','wplister'); ?>
		                                <?php wplister_tooltip('The international location or region to where the item seller will ship the item.') ?>
									</th>
									<th>
										<?php echo __('Shipping service','wplister'); ?>
		                                <?php wplister_tooltip('The international shipping service being offered by the seller to ship an item to a buyer.<br>A seller can offer up to four domestic shipping services and up to five international shipping services.') ?>
									</th>
									<th>
										<?php echo __('First item cost','wplister'); ?>
		                                <?php wplister_tooltip('The cost to ship a single item. Enter zero to enable free shipping. This field is required.') ?>
									</th>
									<th>
										<?php echo __('Additional items cost','wplister'); ?>
		                                <?php wplister_tooltip('The cost of shipping each additional item beyond the first item.<br>This is required if the listing is for multiple items. For single-item listings, it should be zero (or is defaulted to zero if left blank).') ?>
									</th>
									<th>&nbsp;</th>
								</tr>

								<?php foreach ($item_details['int_shipping_options'] as $service) : ?>
								<tr class="row">
									<td>
										<select name="wpl_e2e_int_shipping_options_flat[][location]" 
												title="Location" class="required-entry select select_location" style="width:100%;">
											<option value="">-- <?php echo __('Please select','wplister'); ?> --</option>
											<?php foreach ($wpl_shipping_locations as $loc => $desc) : ?>
												<option value="<?php echo $loc ?>" 
													<?php if ( @$service['location'] == $loc ) : ?>
														selected="selected"
													<?php endif; ?>
													><?php echo $desc ?></option>
											<?php endforeach; ?>
										</select>
									</td><td>
										<!-- flat shipping services -->
										<select name="wpl_e2e_int_shipping_options_flat[][service_name]" 
												title="Service" class="required-entry select select_service_name" style="width:100%;">
										<?php ProfilesPage::wpl_generate_shipping_option_tags( $wpl_int_flat_shipping_options, $service ) ?>											
										</select>
									</td><td>
										<input type="text" name="wpl_e2e_int_shipping_options_flat[][price]" 
											value="<?php echo @$service['price']; ?>" class="price_input field_price" />
									</td><td>
										<input type="text" name="wpl_e2e_int_shipping_options_flat[][add_price]" 
											value="<?php echo @$service['add_price']; ?>" class="price_input field_add_price" />
									</td><td>
										<input type="button" value="<?php echo __('remove','wplister'); ?>" class="button-secondary" 
											onclick="jQuery(this).parent().parent().remove();" />
									</td>
								</tr>
								<?php endforeach; ?>

							</table>

							<!-- calculated international shipping services table -->
							<table id="int_shipping_options_table_calc" class="service_table_calc service_table" style="">
								
								<tr>
									<th>
										<?php echo __('Shipping service','wplister'); ?>
		                                <?php wplister_tooltip('The international shipping service being offered by the seller to ship an item to a buyer.<br>A seller can offer up to four domestic shipping services and up to five international shipping services.') ?>
									</th>
									<th>
										<?php echo __('Destination','wplister'); ?>
		                                <?php wplister_tooltip('The international location or region to where the item seller will ship the item.') ?>
									</th>
									<!-- <th><?php echo __('Package','wplister'); ?></th> -->
									<!-- <th><?php echo __('Handling fee','wplister'); ?></th> -->
									<th>&nbsp;</th>
								</tr>

								<?php foreach ($item_details['int_shipping_options'] as $service) : ?>
								<tr class="row">
									<td>
										<!-- calculated shipping services -->
										<select name="wpl_e2e_int_shipping_options_calc[][service_name]"
												title="Service" class="required-entry select select_service_name" style="width:100%;">
										<?php ProfilesPage::wpl_generate_shipping_option_tags( $wpl_int_calc_shipping_options, $service ) ?>											
										</select>
									</td><td>
										<select name="wpl_e2e_int_shipping_options_calc[][location]" 
												title="Location" class="required-entry select select_location" style="width:100%;">
											<option value="">-- <?php echo __('Please select','wplister'); ?> --</option>
											<?php foreach ($wpl_shipping_locations as $loc => $desc) : ?>
												<option value="<?php echo $loc ?>" 
													<?php if ( @$service['location'] == $loc ) : ?>
														selected="selected"
													<?php endif; ?>
													><?php echo $desc ?></option>
											<?php endforeach; ?>
										</select>
									</td><td>
										<input type="button" value="<?php echo __('remove','wplister'); ?>" class="button-secondary" 
											onclick="jQuery(this).parent().parent().remove();" />
									</td>
								</tr>
								<?php endforeach; ?>

							</table>

							<input type="button" value="<?php echo __('Add international shipping option','wplister'); ?>" 
								id="btn_add_int_shipping_option" 
								name="btn_add_int_shipping_option" 
								onclick="handleAddShippingServiceRow('international');"
								class="button-secondary button-add-shipping-option">

							<div class="service_table_calc int_service_table_calc" style="border-top:1px solid #ccc; margin-top:10px; padding-top:10px;">
								<label class="text_label">
									<?php echo __('Packaging and handling costs','wplister'); ?>:
		                            <?php wplister_tooltip('Fees a seller might assess for the shipping of the item (in addition to whatever the shipping service might charge).') ?>
								</label>
								<input type="text" name="wpl_e2e_InternationalPackagingHandlingCosts" 
									value="<?php echo @$item_details['InternationalPackagingHandlingCosts']; ?>" class="" />								
							</div>