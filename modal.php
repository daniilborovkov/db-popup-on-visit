<?php
/**
 *  @package         Db_Popup_On_Visit
 */

/**
 * Register plugin scripts
 * @return [type] [description]
 */
function db_popup_on_visit_enqueue_script()
{
    // wp_enqueue_script('micromodal', plugin_dir_url(__FILE__) . 'micromodal.min.js', array('jquery'));
    wp_enqueue_script('micromodal', plugin_dir_url(__FILE__) . 'micromodal.min.js', array('jquery'));

    wp_enqueue_style('micromodal-style', plugin_dir_url(__FILE__) . 'plugin-style.css', array(), '2018', 'all');

    wp_enqueue_script('db-popup-on-visit-cookie', plugin_dir_url(__FILE__) . 'jquery.cookie.js', array('jquery'), '2018');
    wp_enqueue_script('db-popup-on-visit-script', plugin_dir_url(__FILE__) . 'script.js', array('jquery', 'micromodal'), '2018');
}
add_action('wp_enqueue_scripts', 'db_popup_on_visit_enqueue_script');

function db_popup_on_visit_render_modal()
{
    ?>
    <style>
    /*task theme fixes*/
    header {
      display: block !important;
    }
   .modal.micromodal-slide.is-open {
      overflow: hidden;
    }
      .modal__btn-close {
        margin-left: 20px;
      }
      #modal-youtube .modal__container {
        height: 315px;
        width: 560px;
        max-width: unset;
        padding: 0px;
        overflow-y: visible;
      }
      .close-modal {
        position: absolute;
        top: 0;
        right: -50px;
        color: #fff;
        font-size: 30px;
        background: transparent;
        border: none;
        box-shadow: none !important;
        outline: none;
      }
    </style>
    <div class="modal micromodal-slide" id="modal-1" aria-hidden="false">
      <div class="modal__overlay" tabindex="-1">
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
          <div class="modal__content" id="modal-1-content">
            <button class="modal__btn modal__btn-primary" id="db_popup_on_visit_accept"><?php echo get_option('accept_text'); ?></button>
            <button class="modal__btn modal__btn-close" id="db_popup_on_visit_decline" data-micromodal-close="" aria-label="<?php echo get_option('decline_text'); ?>"><?php echo get_option('decline_text'); ?></button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal micromodal-slide" id="modal-youtube" aria-hidden="false">
      <div class="modal__overlay" tabindex="-1">
        <div class="modal__container" role="dialog"  data-micromodal-close="" aria-modal="true" aria-labelledby="modal-1-title">
          <div class="modal__content" id="modal-1-content">
            <button class="close-modal" aria-label="Close modal" data-micromodal-close>X</button>
            <?php echo get_option('youtube_video_link'); ?>
          </div>
        </div>
      </div>
    </div>
  <?php
}
add_action('wp_footer', 'db_popup_on_visit_render_modal');