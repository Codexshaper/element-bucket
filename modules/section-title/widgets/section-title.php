<?php
/**
 * Section Title Widget file
 *
 * @category   Widget
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucketLite\Modules\SectionTitle\Widgets;

use CodexShaper\ElementBucketLite\Base\Widget;
use Elementor\Controls_Manager;

/**
 * Secion Title widget class
 *
 * @category   Class
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */
class Section_Title extends Widget {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eb-widget-section-title';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'EB Section Title', 'elementbucket-lite' );
	}

	/**
	 * Get Search Keywords.
	 *
	 * @return array Widget title.
	 */
	public function get_keywords() {
		return array( 'Section Title', 'CodexShaper', 'Element Bucket' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-accordion';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'elementbucket-lite' );
	}

	/**
	 * Get style dependencies.
	 *
	 * Retrieve the list of style dependencies the widget requires.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget style dependencies.
	 */
	public function get_style_depends(): array {
		return array( 'eb-widget-section-title' );
	}

	/**
	 * Register Elementor widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'settings_section',
			array(
				'label' => __( 'General Settings', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'sub_title_icon',
			array(
				'label'   => esc_html__( 'Sub Title Icon', 'elementbucket-lite' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => array(
					'value'   => 'fas fa-circle',
					'library' => 'fa-solid',
				),

			),
		);
		$this->add_control(
			'sub_title_icon_width',
			array(
				'label'      => esc_html__( 'Sub Title Icon Width', 'elementbucket-lite' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1000,
						'step' => 5,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'default'    => array(
					'unit' => '%',
				),
				'selectors'  => array(
					'{{WRAPPER}} .subtitle i' => 'width: {{SIZE}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'sub-title',
			array(
				'label' => __( 'Sub Title', 'elementbucket-lite' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'section-title',
			array(
				'label' => __( 'Section Title', 'elementbucket-lite' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'section_description',
			array(
				'label' => __( 'Section Description', 'elementbucket-lite' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$this->end_controls_section();

		// style tab start.
		$this->start_controls_section(
			'sub_title',
			array(
				'label' => __( 'Sub Title', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'sub_title_color',
			array(
				'label'     => __( 'Sub Title Color', 'elementbucket-lite' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
				),
				'separator' => 'before',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'sub_title_typography',
				'label'    => __( 'Sub Title Typography', 'elementbucket-lite' ),
				'selector' => '{{WRAPPER}} .sub-title',
			)
		);
		$this->add_control(
			'sub_title_margin',
			array(
				'label'      => esc_html__( 'Sub Title Margin', 'elementbucket-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'default'    => array(
					'top'      => 0,
					'right'    => 0,
					'bottom'   => 15,
					'left'     => 0,
					'unit'     => 'px',
					'isLinked' => false,
				),
				'selectors'  => array(
					'{{WRAPPER}} .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'sub_title_padding',
			array(
				'label'      => esc_html__( 'Sub Title Padding', 'elementbucket-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'default'    => array(
					'top'      => 0,
					'right'    => 0,
					'bottom'   => 0,
					'left'     => 0,
					'unit'     => 'px',
					'isLinked' => false,
				),
				'selectors'  => array(
					'{{WRAPPER}} .subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'sub_title_justify_content',
			array(
				'label'     => esc_html__( 'Alignment', 'elementbucket-lite' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'elementbucket-lite' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementbucket-lite' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'elementbucket-lite' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .subtitle' => 'justify-content: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_title',
			array(
				'label' => __( 'Section Title', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'section _title_color',
			array(
				'label'     => __( 'Section Title Color', 'elementbucket-lite' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .section-title' => 'color: {{VALUE}}',
				),
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_title_typography',
				'label'    => __( 'Section Title Typography', 'elementbucket-lite' ),
				'selector' => '{{WRAPPER}} .section-title',
			)
		);
		$this->add_control(
			'section_title_margin',
			array(
				'label'      => esc_html__( 'Section Title Margin', 'elementbucket-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'default'    => array(
					'top'      => 0,
					'right'    => 0,
					'bottom'   => 15,
					'left'     => 0,
					'unit'     => 'px',
					'isLinked' => false,
				),
				'selectors'  => array(
					'{{WRAPPER}} .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'section_title_padding',
			array(
				'label'      => esc_html__( 'Section Title Padding', 'elementbucket-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'default'    => array(
					'top'      => 0,
					'right'    => 0,
					'bottom'   => 0,
					'left'     => 0,
					'unit'     => 'px',
					'isLinked' => false,
				),
				'selectors'  => array(
					'{{WRAPPER}} .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'section_title_text_align',
			array(
				'label'     => esc_html__( 'Alignment', 'elementbucket-lite' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'elementbucket-lite' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementbucket-lite' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'elementbucket-lite' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'description_title',
			array(
				'label' => __( 'Description Title', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'section_description_color',
			array(
				'label'     => __( 'Section Description  Color', 'elementbucket-lite' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .description' => 'color: {{VALUE}}',
				),
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_description_typography',
				'label'    => __( 'Section Description Typography', 'elementbucket-lite' ),
				'selector' => '{{WRAPPER}} .description',
			)
		);
		$this->add_control(
			'description_margin',
			array(
				'label'      => esc_html__( 'Description Title Margin', 'elementbucket-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'default'    => array(
					'top'      => 0,
					'right'    => 0,
					'bottom'   => 15,
					'left'     => 0,
					'unit'     => 'px',
					'isLinked' => false,
				),
				'selectors'  => array(
					'{{WRAPPER}} .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'description_padding',
			array(
				'label'      => esc_html__( 'Description Padding', 'elementbucket-lite' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
				'default'    => array(
					'top'      => 0,
					'right'    => 0,
					'bottom'   => 0,
					'left'     => 0,
					'unit'     => 'px',
					'isLinked' => false,
				),
				'selectors'  => array(
					'{{WRAPPER}} .description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_control(
			'description_text_align',
			array(
				'label'     => esc_html__( 'Alignment', 'elementbucket-lite' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'elementbucket-lite' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'elementbucket-lite' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'elementbucket-lite' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .description' => 'text-align: {{VALUE}};',
				),
			)
		);
		$this->end_controls_section();
	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$icon_tag = '';

		if ( ! empty( $settings['sub_title_icon'] ) ) {
			$icon     = \Elementor\Icons_Manager::try_get_icon_html(
				$settings['sub_title_icon'],
				array(
					'aria-hidden' => 'true',
					'fill'        => 'currentColor',
					'width'       => '100%',
				)
			);
			$icon_tag = '<i>' . wp_kses( $icon, get_eb_svg_rules() ) . '</i>';
		}

		?>
		<?php echo "<div class='section-heading'>  <span class='subtitle'> " . wp_kses( $icon_tag, get_eb_svg_rules() ) . " <p class='sub-title'>" . esc_html( $settings['sub-title'] ) . "</p> </span>  <h2 class='section-title'>" . esc_html( $settings['section-title'] ) . "</h2> <p class='description'>" . esc_html( $settings['section_description'] ) . '</p> </div>'; ?>
		<?php
	}
}