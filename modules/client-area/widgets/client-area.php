<?php
/**
 * Client Area Widget file
 *
 * @category   Widget
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucketLite\Modules\ClientArea\Widgets;

use CodexShaper\ElementBucketLite\Base\Widget;
use Elementor\Controls_Manager;

/**
 * Client Area widget class
 *
 * @category   Class
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */
class Client_Area extends Widget {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'eb-widget-client-area';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'EB Client Area', 'elementbucket-lite' );
	}

	/**
	 * Get widget keywords.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return array( 'Client Area', 'CodexShaper', 'Element Bucket' );
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
		return array( 'eb-widget-client-area' );
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
			'sliding_control',
			array(
				'label'   => __( 'Sliding Style Control', 'elementbucket-lite' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'style_01' => __( 'Style 01', 'elementbucket-lite' ),
					'style_02' => __( 'Style 02', 'elementbucket-lite' ),
				),
				'default' => 'style_01',
			)
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'image',
			array(
				'label'       => __( 'Image', 'elementbucket-lite' ),
				'type'        => Controls_Manager::MEDIA,
				'description' => __( 'Upload image', 'elementbucket-lite' ),

			)
		);

		$this->add_control(
			'items',
			array(
				'label'       => __( 'Items', 'elementbucket-lite' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => array(
					array(
						'image' => array(
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						),
					),
				),

				'title_field' => '<img src="{{ image.url }}" style="width: 50px; height: auto;">',
			)
		);
		$this->add_control(
			'button_control',
			array(
				'label'        => __( 'Slider Button On Off', 'elementbucket-lite' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'elementbucket-lite' ),
				'label_off'    => __( 'No', 'elementbucket-lite' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);

		$this->add_control(
			'next_slider',
			array(
				'label'       => __( 'Next Icon', 'elementbucket-lite' ),
				'type'        => Controls_Manager::MEDIA,
				'description' => __( 'Upload Image', 'elementbucket-lite' ),
				'condition'   => array(
					'button_control' => 'yes',
				),
			),
		);
		$this->add_control(
			'prev_slider',
			array(
				'label'       => __( 'Previous Icon', 'elementbucket-lite' ),
				'type'        => Controls_Manager::MEDIA,
				'description' => __( 'Upload Image', 'elementbucket-lite' ),
				'condition'   => array(
					'button_control' => 'yes',
				),
			)
		);

		$this->end_controls_section();

		// Style tab start.
		$this->start_controls_section(
			'styling_section',
			array(
				'label' => __( 'Styling Settings', 'elementbucket-lite' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
		$settings  = $this->get_settings_for_display();
		$classname = 'eb-client-slider-two';
		if ( 'style_01' === $settings['sliding_control'] ) {
			$classname = 'eb-client-slider-one';
		}
		?>
		<!-- start client area -->
		<div class="client-area-9 pt-120">
			<div class="container position-relative">
				<!-- Slider  -->
				<div class="swiper <?php echo esc_attr( $classname ); ?>">
					<div class="swiper-wrapper">
						<!-- Slide  -->
						<?php if ( ! empty( $settings['items'] ) ) : ?>
							<?php foreach ( $settings['items'] as $item ) : ?>
								<div class="swiper-slide eb-client-slide">
									<img src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="Client">
								</div>
							<?php endforeach; ?>
						<?php endif; ?>

					</div>
				</div>
				<!-- Navigation  -->
				<div class="navigation-wrap">
					<?php if ( 'yes' === $settings['button_control'] ) : ?>
						<?php if ( isset( $settings['prev_slider'] ) && ! empty( $settings['prev_slider']['url'] ) ) : ?>
							<div class="client-prev btn-navigation"><img class="icon" src="<?php echo esc_url( $settings['prev_slider']['url'] ); ?>" alt="Icon"></div>
						<?php endif; ?>
						<?php if ( isset( $settings['next_slider'] ) && ! empty( $settings['next_slider']['url'] ) ) : ?>
							<div class="client-next btn-navigation"><img class="icon" src="<?php echo esc_url( $settings['next_slider']['url'] ); ?>" alt="Icon"></div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			   
			</div>
		</div>
		<!-- end client area -->
		<?php
	}
}