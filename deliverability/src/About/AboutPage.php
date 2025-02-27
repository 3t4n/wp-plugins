<?php

namespace TopDeliverability\About;

use TopDeliverability\Page;
use TopDeliverability\Template;

class AboutPage implements Page {

	/**
	 * @var Template\Renderer
	 */
	private $templateRenderer;

	/**
	 * @param Template\Renderer $templateRenderer
	 */
	public function __construct( Template\Renderer $templateRenderer ) {
		$this->templateRenderer = $templateRenderer;
	}

	function render() {
		$context = new Template\Context(
			array(
				'purpose'    => array(
					'title'   => $this->pluginPurpose(),
					'content' => array(
						$this->pluginPurposeContent0(),
						$this->pluginPurposeContent1(),
						$this->pluginPurposeContent2(),
					),
				),
				'who_we_are' => array(
					'title'   => $this->whoWeAre(),
					'content' => array(
						$this->whoWeAreContent0(),
						$this->whoWeAreContent1(),
						$this->whoWeAreContent2(),
						$this->whoWeAreContent3(),
						$this->whoWeAreContent4(),
					),
				),
			)
		);

		$this->templateRenderer->display( 'about.twig', $context );
	}

	/**
	 * @return string
	 */
	private function pluginPurpose() {
		return __( 'Plugin Purpose', 'deliverability' );
	}

	/**
	 * @return string
	 */
	private function pluginPurposeContent0() {
		return __( 'Deliverability plugin is a simple and user-friendly WordPress plugin that helps improve email deliverability by signing messages with DKIM and monitoring key Email Authentication an Reputation metrics. With this plugin, you can easily set up DKIM signing for your domain.', 'deliverability' );
	}

	/**
	 * @return string
	 */
	private function pluginPurposeContent1() {
		return __( 'Once installed, the plugin will automatically scan your deliverability settings and provide you with a detailed breakdown of their status. The plugin then displays these metrics in an easy-to-read dashboard, allowing users to quickly see how their email deliverability is performing and identify areas for improvement. This information will help you identify potential issues and take steps to improve the deliverability of your emails.', 'deliverability' );
	}

	/**
	 * @return string
	 */
	private function pluginPurposeContent2() {
		return __( 'Overall, Deliverability plugin is a valuable tool for anyone looking to improve their email deliverability and ensure that their messages reach their intended recipients. Its simple and intuitive design makes it easy to use, even for those with little technical expertise.', 'deliverability' );
	}

	/**
	 * @return string
	 */
	private function whoWeAre() {
		return __( 'Who we are', 'deliverability' );
	}

	/**
	 * @return string
	 */
	private function whoWeAreContent0() {
		return __( 'At Top Deliverability, we pride ourselves on having some of the best experienced professionals in email deliverability on our team.', 'deliverability' );
	}

	/**
	 * @return string
	 */
	private function whoWeAreContent1() {
		return __( 'With over 15 years of experience in the industry, our team has the knowledge and expertise to help improve email deliverability for businesses of all sizes. Our team consists of certified email deliverability experts who have worked with some of the biggest names in the industry.', 'deliverability' );
	}

	/**
	 * @return string
	 */
	private function whoWeAreContent2() {
		return __( 'We understand that email deliverability can be a complex and daunting task, which is why we offer comprehensive solutions that are tailored to your specific needs. Whether you need help with email deliverability metrics, sender reputation management, or implementing email authentication protocols, our team has you covered.', 'deliverability' );
	}

	/**
	 * @return string
	 */
	private function whoWeAreContent3() {
		return __( 'At our core, we are committed to helping our clients achieve their goals and improve their email deliverability. We take pride in our exceptional customer service and always go the extra mile to ensure our clients are satisfied with our services.', 'deliverability' );
	}

	/**
	 * @return string
	 */
	private function whoWeAreContent4() {
		return __( 'At Top Deliverability, we believe that email deliverability is a crucial factor in the success of any business.', 'deliverability' );
	}
}
