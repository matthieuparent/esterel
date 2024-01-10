<div class="section s-faq">
    <div class="wrapper wrapper--small">
        <div class="grid-center">
            <h2 class="title-tertiary highlight" data-scrolly="fromLeft"><?php echo get_sub_field('faq_title') ?></h2>
            <div class="questions" data-component="Accordion">

                <?php if( have_rows('faq_questions') ): ?>
                <?php while( have_rows('faq_questions') ): 
                        the_row(); 
                    ?>
                <div class="question" data-scrolly="fromBottom">
                    <div class="question__title">
                        <svg class="icon icon-plus">
                            <use xlink:href="#icon-plus"></use>
                        </svg>
                        <svg class="icon icon-minus">
                            <use xlink:href="#icon-minus"></use>
                        </svg>
                        <h3 class="title-cintary"><?php echo get_sub_field('questions_question'); ?></h3>
                    </div>
                    <div class="question__answer js-answer">
                        <div class="answer__wrapper">
                            <?php echo get_sub_field('questions_answer'); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>


            </div>
        </div>
    </div>
</div>