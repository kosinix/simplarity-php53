<?php
namespace Simplarity;

class SettingsPage extends WpSubPage {
    
    public function render_settings_page() {
        $option_name = $this->settings_page_properties['option_name'];
        $option_group = $this->settings_page_properties['option_group'];
        $settings_data = $this->get_settings_data();
        ?>
        <div class="wrap">
            <h2>Simplarity</h2>
            <p>This plugin is using the settings API in PHP 5.3+.</p>
            <form method="post" action="options.php">
                <?php
                settings_fields( $option_group );
                ?>
                <table class="form-table">
                    <tr>
                        <th><label for="textbox">Textbox:</label></th>
                        <td>
                            <input type="text" id="textbox" name="<?php echo esc_attr( $option_name."[textbox]" ); ?>" value="<?php echo esc_attr( $settings_data['textbox'] ); ?>" />
                        </td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Options">
            </form>
        </div>
        <?php
    }
	
	public function get_default_settings_data() {
		$defaults = array();
		$defaults['textbox'] = '';
		
		
		return $defaults;
	}
}
