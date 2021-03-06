<?php

/**
 * @file
 * The class for Dataverse Listing boxes.
 */

class os_boxes_dataverse_list extends os_boxes_default {

  public $embed_as = array(
    'iframe',
  );

  /**
   * Implementation of boxes_content::options_defaults().
   */
  public function options_defaults(){
    $options = parent::options_defaults();
    $options['user_alias'] = '';
    $options['embed_height'] = '500px';
    $options['visibility'] = 'feature';
    return $options;
  }

  /**
   * Implementation of boxes_content::options_form().
   */
  public function options_form(&$form_state){
    $form = parent::options_form($form_state);

    $base_url = variable_get("dataverse_base_url", "https://dataverse.harvard.edu") . "/dataverse/";

    $form['user_alias'] = array(
      '#type' => 'textfield',
      '#title' => t('Identifier'),
      '#required' => TRUE,
      '#field_prefix' => $base_url,
      '#default_value' => $this->options['user_alias'],
    );

    $form['embed_height'] = array(
      '#type' => 'textfield',
      '#title' => 'Embed Height',
      '#default_value' => $this->options['embed_height'],
    );

    return $form;
  }

  /**
   * Implementation of boxes_content::render().
   */
  public function render() {
    if (module_exists('vsite') && !vsite_get_vsite()) {
      return;
    }

    $embed_height = preg_replace('/\D/', '', $this->options['embed_height']);
    $base_url = variable_get("dataverse_base_url", "https://dataverse.harvard.edu") . "/resources/js/widgets.js?alias=" . $this->options['user_alias'] . "&amp;dvUrl=" . variable_get("dataverse_base_url", "https://dataverse.harvard.edu") . "&amp;widget=iframe&amp;heightPx=" . $embed_height;

    $block = parent::render();
    $block['content'] = "<script src=\"$base_url\"></script>";
    return $block;
  }

}
