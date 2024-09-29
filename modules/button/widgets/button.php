<?php
/**
 * Button Widget file
 *
 * @category   Widget
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucketLite\Modules\Button\Widgets;

use CodexShaper\ElementBucketLite\Base\Widget;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // Exit if access directly.
}

/**
 * Button widget class
 *
 * @category   Class
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */
class Button extends Widget {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eb-widget-button';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'EB Button', 'elementbucket-lite' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-button';
	}

	/**
	 * Get widget keywords.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'Button', 'CodexShaper', 'Element Bucket' );
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
		return array( 'eb-widget-button' );
	}

	/**
	 * Register Elementor widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 *
	 * @return void
	 */
	protected function register_controls() {
		// General Settings.
		$this->start_controls_section(
			'general_settings_section',
			array(
				'label' => __( 'General Settings', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'eb_button_tag',
			array(
				'label'   => __( 'Button Tag', 'elementbucket-lite' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'a'      => __( 'link', 'elementbucket-lite' ),
					'button' => __( 'button', 'elementbucket-lite' ),
				),
				'default' => 'a',
			)
		);
		$this->add_control(
			'eb_button_type',
			array(
				'label'   => __( 'Button Type', 'elementbucket-lite' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'default' => __( 'Default', 'elementbucket-lite' ),
					'circle'  => __( 'Circle', 'elementbucket-lite' ),
				),
				'default' => 'default',
			)
		);
		$this->add_control(
			'eb_button_text',
			array(
				'label'   => __( 'Button Text', 'elementbucket-lite' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'EB Button', 'elementbucket-lite' ),
			)
		);
		$this->add_control(
			'eb_link_button_url',
			array(
				'label'       => __( 'Button url', 'elementbucket-lite' ),
				'type'        => Controls_Manager::URL,
				'options'     => array( 'url', 'is_external', 'nofollow' ),
				'default'     => array(
					'url'         => '#',
					'is_external' => true,
					'nofollow'    => true,
				),
				'label_block' => true,
				'condition'   => array( 'eb_button_tag' => 'a' ),
			)
		);
		$this->end_controls_section();

		// General Settings.
		$this->start_controls_section(
			'icon_settings_section',
			array(
				'label' => __( 'Icon Settings', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'eb_button_icon',
			array(
				'label' => __( 'Button Icon', 'elementbucket-lite' ),
				'type'  => Controls_Manager::ICONS,
			)
		);
		$this->add_control(
			'eb_default_button_icon_alignment',
			array(
				'label'     => __( 'Icon Alignment', 'elementbucket-lite' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'icon-right' => __( 'Right', 'elementbucket-lite' ),
					'icon-left'  => __( 'Left', 'elementbucket-lite' ),
				),
				'default'   => 'icon-right',
				'condition' => array(
					'eb_button_type' => 'default',
				),
			)
		);
		$this->add_control(
			'eb_circle_button_icon_alignment',
			array(
				'label'     => __( 'Icon Alignment', 'elementbucket-lite' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'icon-top'    => __( 'Top', 'elementbucket-lite' ),
					'icon-bottom' => __( 'Bottom', 'elementbucket-lite' ),
				),
				'default'   => 'icon-bottom',
				'condition' => array( 'eb_button_type' => 'circle' ),
			)
		);
		$this->end_controls_section();

		// Overlay Settings.
		$this->start_controls_section(
			'eb_button_overlay_settings_section',
			array(
				'label' => __( 'Overlay Settings', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'eb_default_button_overlay_effect',
			array(
				'label'     => __( 'Hover Overlay Effect Style', 'elementbucket-lite' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'no-hover-effect'    => __( 'None', 'elementbucket-lite' ),
					'hover-effect-one'   => __( 'Effect One', 'elementbucket-lite' ),
					'hover-effect-two'   => __( 'Effect Two', 'elementbucket-lite' ),
					'hover-effect-three' => __( 'Effect Three', 'elementbucket-lite' ),
				),
				'default'   => 'no-hover-effect',
				'condition' => array( 'eb_button_type' => 'default' ),
			)
		);
		$this->add_control(
			'eb_circle_button_overlay_effect',
			array(
				'label'     => __( 'Hover Overlay Effect Style', 'elementbucket-lite' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'no-hover-effect'  => __( 'None', 'elementbucket-lite' ),
					'hover-effect-one' => __( 'Effect One', 'elementbucket-lite' ),
				),
				'default'   => 'no-hover-effect',
				'condition' => array( 'eb_button_type' => 'circle' ),
			)
		);
		$this->end_controls_section();

		// Custom Class Settings.
		$this->start_controls_section(
			'custom_settings_section',
			array(
				'label' => __( 'Custom Class Settings', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'eb_button_custom_class',
			array(
				'label'       => __( 'Custom Button Class', 'elementbucket-lite' ),
				'type'        => Controls_Manager::TEXT,
				'description' => 'If you need to add any specific class.',
			)
		);
		$this->end_controls_section();

		// Button Size Styling.
		$this->start_controls_section(
			'eb_button_sizing_styling_section',
			array(
				'label' => __( 'Button Size', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_responsive_control(
			'eb_default_button_height',
			array(
				'type'      => Controls_Manager::SLIDER,
				'label'     => __( 'Button Height', 'elementbucket-lite' ),
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 500,
					),
				),
				'devices'   => array( 'desktop', 'tablet', 'mobile' ),
				'selectors' => array(
					'{{WRAPPER}} .eb-btn.eb-btn-default' => 'height: {{SIZE}}{{UNIT}};',
				),
				'condition' => array( 'eb_button_type' => 'default' ),
			)
		);
		$this->add_responsive_control(
			'eb_circle_button_size',
			array(
				'type'      => Controls_Manager::SLIDER,
				'label'     => __( 'Button Width and Height', 'elementbucket-lite' ),
				'range'     => array(
					'px' => array(
						'min' => 0,
						'max' => 500,
					),
				),
				'devices'   => array( 'desktop', 'tablet', 'mobile' ),
				'selectors' => array(
					'{{WRAPPER}} .eb-btn.eb-btn-circle' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				),
				'condition' => array( 'eb_button_type' => 'circle' ),
			)
		);
		$this->add_responsive_control(
			'eb_button_padding',
			array(
				'label'      => __( 'Button Padding', 'elementbucket-lite' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .eb-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->add_responsive_control(
			'eb_button_border_radius',
			array(
				'label'      => __( 'Button Border Radius', 'elementbucket-lite' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .eb-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);
		$this->end_controls_section();

		// Button Background Color.
		$this->start_controls_section(
			'eb_button_bg_color_styling',
			array(
				'label' => __( 'Button Background', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'eb_button_bg_color_tab',
		);
			$this->start_controls_tab(
				'eb_button_bg_normal_tab',
				array(
					'label' => __( 'Normal', 'elementbucket-lite' ),
				)
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'     => 'eb_button_bg_color',
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .eb-btn',

				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'eb_button_bg_hover_tab',
				array(
					'label' => __( 'Hover', 'elementbucket-lite' ),
				)
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'     => 'eb_button_hover_bg_color',
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .eb-btn:hover',
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Text.
		$this->start_controls_section(
			'eb_button_text_color_styling',
			array(
				'label' => __( 'Button Text', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'eb_button_text_color_tab',
		);
			$this->start_controls_tab(
				'eb_button_text_normal_tab',
				array(
					'label' => __( 'Normal', 'elementbucket-lite' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'      => 'eb_button_text_typography',
					'label'     => __( 'Text Typography', 'elementbucket-lite' ),
					'selectors' => array(
						'{{WRAPPER}} .eb-btn',
					),
				)
			);
			$this->add_control(
				'eb_button_text_color',
				array(
					'label'     => __( 'Text Color', 'elementbucket-lite' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .eb-btn' => 'color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'eb_button_text_hover_tab',
				array(
					'label' => __( 'Hover', 'elementbucket-lite' ),
				)
			);
			$this->add_control(
				'eb_button_text_hover_color',
				array(
					'label'     => __( 'Text Color', 'elementbucket-lite' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .eb-btn:hover' => 'color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Border Color.
		$this->start_controls_section(
			'eb_button_border_styling',
			array(
				'label' => __( 'Button Border', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'eb_button_border_tab',
		);
			$this->start_controls_tab(
				'eb_button_border_normal_tab',
				array(
					'label' => __( 'Normal', 'elementbucket-lite' ),
				)
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'     => 'eb_button_border_normal',
					'label'    => __( 'Border', 'elementbucket-lite' ),
					'selector' => '{{WRAPPER}} .eb-btn',
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'eb_button_border_hover_tab',
				array(
					'label' => __( 'Hover', 'elementbucket-lite' ),
				)
			);
			$this->add_control(
				'eb_button_border_hover_color',
				array(
					'label'     => __( 'Border Color', 'elementbucket-lite' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .eb-btn:hover' => 'border-color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Icon.
		$this->start_controls_section(
			'eb_button_icon_color_styling',
			array(
				'label' => __( 'Button Icon', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'eb_button_icon_color_tab',
		);
			$this->start_controls_tab(
				'eb_button_icon_color_normal_tab',
				array(
					'label' => __( 'Normal', 'elementbucket-lite' ),
				)
			);
			$this->add_responsive_control(
				'eb_button_icon_size',
				array(
					'type'      => Controls_Manager::SLIDER,
					'label'     => __( 'Icon Size', 'elementbucket-lite' ),
					'range'     => array(
						'px' => array(
							'min' => 0,
							'max' => 500,
						),
					),
					'devices'   => array( 'desktop', 'tablet', 'mobile' ),
					'selectors' => array(
						'{{WRAPPER}} .eb-btn svg' => 'width: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->add_control(
				'eb_button_icon_color',
				array(
					'label'     => __( 'Icon Color', 'elementbucket-lite' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .eb-btn svg'      => 'fill: {{VALUE}}',
						'{{WRAPPER}} .eb-btn svg path' => 'fill: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'eb_button_icon_color_hover_tab',
				array(
					'label' => __( 'Hover', 'elementbucket-lite' ),
				)
			);
			$this->add_control(
				'eb_button_icon_hover_color',
				array(
					'label'     => __( 'Icon Color', 'elementbucket-lite' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .eb-btn:hover svg' => 'fill: {{VALUE}}',
						'{{WRAPPER}} .eb-btn:hover svg path' => 'fill: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// Button Overlay.
		$this->start_controls_section(
			'eb_button_overlay_background_styling',
			array(
				'label' => __( 'Button Overlay', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'      => 'eb_button_before_after_bg_color',
				'label'     => __( 'On Hover Overlay Bg Color', 'elementbucket-lite' ),
				'types'     => array( 'classic', 'gradient' ),
				'selectors' => '{{WRAPPER}} .eb-btn:hover::before, {{WRAPPER}} .eb-btn:hover::after',
			)
		);
		$this->end_controls_section();

		// Button Box Shadow.
		$this->start_controls_section(
			'eb_button_boxs_hadow_styling',
			array(
				'label' => __( 'Button Box Shadow', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->start_controls_tabs(
			'eb_button_boxs_hadow_tab',
		);
			$this->start_controls_tab(
				'eb_button_boxs_hadow_normal_tab',
				array(
					'label' => __( 'Normal', 'elementbucket-lite' ),
				)
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'     => 'eb_button_box_shadow_normal',
					'selector' => '{{WRAPPER}} .eb-btn',
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'eb_button_boxs_hadow_hover_tab',
				array(
					'label' => __( 'Hover', 'elementbucket-lite' ),
				)
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'     => 'eb_button_box_shadow_hover',
					'selector' => '{{WRAPPER}} .eb-btn',
				)
			);
			$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	/**
	 * Render Elementor widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return void
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$link_url = isset( $settings['eb_link_button_url'] ) && ! empty( $settings['eb_link_button_url'] ) ? $settings['eb_link_button_url']['url'] : '#';
		$href     = 'a' === $settings['eb_button_tag'] ? "href='{$link_url}'" : '';
		$icon     = '';
		$classes  = '';
		$classes .= 'default' === $settings['eb_button_type'] ? ' eb-btn-default' : ' eb-btn-circle';
		if ( 'default' === $settings['eb_button_type'] ) {
			$classes .= 'icon-left' === $settings['eb_default_button_icon_alignment'] ? ' icon-left' : ' icon-right';
			$classes .= ' ' . $settings['eb_default_button_overlay_effect'];
		}
		if ( 'circle' === $settings['eb_button_type'] ) {
			$classes .= 'icon-top' === $settings['eb_circle_button_icon_alignment'] ? ' icon-top' : ' icon-bottom';
			$classes .= ' ' . $settings['eb_circle_button_overlay_effect'];
		}
		$classes .= ! empty( $settings['eb_button_custom_class'] ) ? ' ' . $settings['eb_button_custom_class'] : '';

		if ( ! empty( $settings['eb_button_icon'] ) ) {
			$icon = Icons_Manager::try_get_icon_html(
				$settings['eb_button_icon'],
				array(
					'aria-hidden' => 'true',
					'fill'        => 'currentColor',
					'width'       => '16',
				)
			);
		}

		?>
		<?php echo '<' . esc_html( $settings['eb_button_tag'] ) . ' ' . esc_html( $href ) . ' class="eb-btn eb-btn-primary' . esc_attr( $classes ) . '">' . esc_html( $settings['eb_button_text'] ) . ' ' . wp_kses( $icon, get_eb_svg_rules() ) . '</' . esc_html( $settings['eb_button_tag'] ) . '>'; ?>
		<?php
	}
}
