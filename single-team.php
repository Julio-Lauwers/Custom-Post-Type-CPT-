<?php
/**
 * Template Name: Especialistas
 */
get_header();
?>
<?php
if (have_posts()):
    while (have_posts()):
        the_post();
        ?>
        <div class="container bg-light">
            <div class="row">


                <div class="col-12 col-lg-6 justify-content-center">

                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail(array(750, 600), array('class' => 'img-fluid w-100 h-auto'));
                        ;
                    }
                    ?>


                    <div class="name-doc">
                        <h4>
                            <?php $prefix = get_field('prefixo');
                            echo $prefix ?>
                            <?php the_title(); ?>
                        </h4>

                        <h5>
                            <?php $documentss = get_field('specialist-document');
                            echo $documentss ?>
                        </h5>
                        <div class="btn-2">
                            <button data-chatbot-id="73a0e2cd-e9e7-4170-a946-30144856b086">Agende uma avaliação</button>
                        </div>
                    </div>

                </div>


                <!-- Coluna da direita -->
                <div class="col-12 col-lg-6">
                    <div class="specialist-description">
                        <h4>
                            <?php $especialidade = get_field('especialidade');
                            echo $especialidade ?>
                        </h4>

                        <h1 class="custom-title">
                            <?php $prefix = get_field('prefixo');
                            echo $prefix ?>
                            <?php the_title(); ?>
                        </h1>
                        <h5>
                            <?php $documentss = get_field('specialist-document');
                            echo $documentss ?>
                        </h5>
                        <div class="align-self-center w-100">
                            <?php the_content(); ?> <!-- Conteúdo da Página -->
                        </div>
                        <hr>
                        <div class="opening-hours">
                            <?php
                            $horarios = get_field('horarios');

                            if ($horarios) {
                                echo '<h3>Horários de atendimento:</h3>';
                                echo '<ul>';
                                foreach ($horarios as $horario) {
                                    echo '<p class="horario-item">';

                                    // Mapear os valores abreviados do dia para os equivalentes por extenso
                                    $dia_extenso = '';
                                    switch ($horario['dia']) {
                                        case 'segunda':
                                            $dia_extenso = 'Segunda-feira';
                                            break;
                                        case 'terca':
                                            $dia_extenso = 'Terça-feira';
                                            break;
                                        case 'quarta':
                                            $dia_extenso = 'Quarta-feira';
                                            break;
                                        case 'quinta':
                                            $dia_extenso = 'Quinta-feira';
                                            break;
                                        case 'sexta':
                                            $dia_extenso = 'Sexta-feira';
                                            break;
                                        case 'sabado':
                                            $dia_extenso = 'Sábado';
                                            break;
                                        default:
                                            $dia_extenso = $horario['dia']; // Caso não haja correspondência, manter o valor original
                                    }

                                    echo '<span class="day">' . $dia_extenso . '</span>';

                                    // Verificar se 'hora-inicio' e 'hora-termino' estão definidos antes de exibir
                                    if (!empty($horario['hora-inicio']) && !empty($horario['hora-termino'])) {
                                        echo '<span class="hours">' . $horario['hora-inicio'] . ' - ' . $horario['hora-termino'] . '</span>';
                                    } else {

                                    }

                                    echo '</p>';
                                }

                                echo '</ul>';
                            }
                            ?>
                            <p>
                                <?php $observacao = get_field('observacao');
                                echo $observacao ?>
                            </p>
                        </div>
                        <hr>

                        <div class="publications">
                            <h3>Publicações bibliográficas</h3>
                            <p>
                                <?php $publications = get_field('publications');
                                echo $publications ?>
                            </p>
                        </div>
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