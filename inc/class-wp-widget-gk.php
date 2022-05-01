<?php

    class gk_widgets extends WP_Widget {
        function __construct() {
            parent::__construct(
                'gk_widget',
                __('GaudiKids Widget', 'gaudikids_domain'),
                array(
                    'description' => __('Gaudikids Widget', 'gaudikids_domain')
                ),
            );
        }

        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title']);
            echo $args['before_widget'];
            if( !empty ( $title ) ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }

            echo __('Hello, World!', 'gaudikids_domain');
            echo $args['after_widget'];
        }

        public function form( $instance ) {
            if ( isset( $instance['title'] ) ) {
                $title = $instance['title'];
            } else {
                $title = __('New Title', 'gaudikids_domain');
            }
        }

        public function update( $new_instance, $old_instance ) {

        }
    }

?>