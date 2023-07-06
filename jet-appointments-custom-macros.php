<?php
/*
Plugin Name:  JetAppointments Custom Macros
Plugin URI:   
Description:  Kiegészító a JetAppointments pluginhoz, amellyel bekerül a macro-k közé az időpontot foglaló neve. (appointment_user_name)
Version:      1.0
Author:       Heisenberg0924
Author URI:   
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  jab-custom-macros
Domain Path:  /languages
*/

class Jet_Appointment_Additional_Macros {

	private $manager;

	public function __construct() {
		add_filter( 'jet-apb/macros-list', array( $this, 'add_macros' ), 0, 2 );
	}

	public function add_macros( $macros_list, $manager ) {

		$this->manager = $manager;

		$macros_list['appointment_user_name_'] = array(
			'label' => 'Appointment User Name_',
			'cb'    => array( $this, 'appointment_user_name_' ),
		);

		return $macros_list;

	}

	public function appointment_user_name_( $result = null, $args_str = null ) {
		$appointment = $this->manager->get_macros_object();
		return isset( $appointment['user_name'] ) ? $appointment['user_name'] : "";
	}
	
}

new Jet_Appointment_Additional_Macros;