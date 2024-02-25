<?php
get_header();
?>
<?php
if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
        <div class="container bg-light">
            <div class="row">
                <div class="col-12 col-lg-6 d-flex">
                    <div class="align-self-center w-100">
                        <div class="content-left">
                            <h3>
                                <?php the_title(); ?>
                            </h3>

                            <p>
                                <?php
                                $excerpt = get_the_excerpt();
                                echo $excerpt;
                                ?>
                            </p>
                            <div class="btn-1">
                                <button data-chatbot-id="73a0e2cd-e9e7-4170-a946-30144856b086">Agendar uma avaliação</button>
                            </div>

                            <div class="expert-image">
                                <?php
                                $especialistas = get_field('especialistas_relacionados');

                                foreach ($especialistas as $especialista) {
                                    $profile_image_id = get_field('image-perfil', $especialista->ID);

                                    if (!empty($profile_image_id)) {
                                        // Obtém a URL da imagem com base no ID
                                        $profile_image_url = wp_get_attachment_url($profile_image_id);

                                        if (!empty($profile_image_url)) {
                                            echo '<a href="' . get_permalink($especialista->ID) . '"><img src="' . esc_url($profile_image_url) . '" alt="' . esc_attr($especialista->post_title) . '" class="post-thumbnail"></a>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <figure class="px-lg-5 pt-4 pt-lg-0">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail(array(750, 600), array('class' => 'img-fluid w-100 h-auto'));
                        }
                        ?>
                    </figure>


                </div>
            </div>
        </div>
        <!-- Conteudo -->
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">

                    <div class="title-content">
                        <h1>
                            <?php
                            $diagnose_title = get_field('titulo-da-pagina');
                            echo $diagnose_title;
                            ?>
                        </h1>
                    </div>
                    <p>
                        <?php the_content(); ?> <!-- Conteúdo da Página -->
                    </p>

                    <div class="relationship">
                        <h1>Saiba mais sobre Autismo na Infância</h1>
                        <p>
                            <?php
                            $relacionados = get_field('relationship-post');

                            // Verifica se há valores em 'relationship-post'
                            if (!empty($relacionados)) {
                                echo '<div class="relationship-container">';

                                foreach ($relacionados as $relacionado) {
                                    // Obtém o título do post relacionado
                                    $relacionado_title = get_the_title($relacionado);

                                    // Obtém o permalink do post relacionado
                                    $relacionado_permalink = get_permalink($relacionado);

                                    echo '<a class="relationship-link" href="' . esc_url($relacionado_permalink) . '">' . esc_html($relacionado_title) . '</a>';
                                }

                                echo '</div>'; 
                            } else {
                                echo '<p>Nenhum relacionamento encontrado.</p>';
                            }
                            ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <?php
    endwhile;
endif;
?>
<?php
get_footer();
?>