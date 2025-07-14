<?php get_header(); ?>

<div>
    
</div>
<div id="syllabus-content">
	
<div class="feature-header">
  <div class="feature-post-thumbnail">
    <?php
      if ( has_post_thumbnail() ) :
        the_post_thumbnail();
      else:
        ?>
        <div class="slider-alternate">
          <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/banner.png'; ?>">
        </div>
        <?php
      endif;
    ?>
    <div class="header-area">
      <h1 class="post-title feature-header-title"><?php the_title(); ?></h1>
      <?php if ( get_theme_mod('project_management_breadcrumb_enable',true) ) : ?>
        <div class="bread_crumb text-center">
          <?php project_management_breadcrumb();  ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<div id="content">  
  <div class="container">
    <div class="row">
      <?php if(get_theme_mod('project_management_single_post_sidebar_layout', 'Right Sidebar') == 'Right Sidebar'){ ?>
      <div class="col-lg-8 col-md-8 mt-5">
        <div>
        <h4>Розробники та рецензенти</h4>
        <?php

        echo "<div class = 'developers_reviwers'>";
        $size = 'large'; // (thumbnail, medium, large, full or custom size)

        echo"<div>";
        echo"<p>Заклад вищої освіти:</p>";
            $image = get_field('LogoUniversytetu');
            if( $image ) {echo "<img src = ".wp_get_attachment_image_src($image,$size)[0]." style='max-height:150px;margin:0 10px;'>";}
        echo "</div>";

        echo"<div>";
        echo"<p>Компанія-рецензент 1:</p>";
            $image = get_field('logo_kompaniyi-reczenzenta_1');
            if( $image ) {echo "<img src = ".wp_get_attachment_image_src($image,$size)[0]." style='max-height:150px;margin:0 10px;'>";}
            // if( $image ) {echo wp_get_attachment_image( $image, $size );}
        echo "</div>";
        
        echo"<div>";
        echo"<p>Компанія-рецензент 2:</p>";
        $image = get_field('logo_kompaniyi-reczenzenta_2');
        if( $image ) {echo "<img src = ".wp_get_attachment_image_src($image,$size)[0]." style='max-height:150px;margin:0 10px;'>";}
        echo "</div>";
?>
      <div>
          <p>Валідація:</p>
          <?php
              // echo (get_the_ID());
              $statuses = get_the_terms( get_the_ID(), 'silabus_status' );
              $valid_image = '';
              foreach ($statuses as $status) {
                 $valid_image = $status->slug;
              }
          ?>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $valid_image;?>.png" alt="Опис зображення" style='max-height:150px;margin:0 10px;'>
        </div>


<?php
        echo "</div>";
        echo "<h5>Розробник навчальної програми:</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'rozrobnyk_programy', true);
          echo "<p>".$my_custom_field."</p>";

?>



            <h4>Базова інформація</h4>
            <div class = "base_information">
        <?php 
            echo "<h5>Шифр та назва спеціальності: </h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Profession_code', true);
            if ($my_custom_field == 'інше'){
                $my_custom_field = get_post_meta(get_the_ID(), 'other_profession_code', true);
            }
            echo $my_custom_field;
            echo "<h5>Назва освітньо-наукової програми</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Program_name', true);
            echo $my_custom_field;

            echo "<h5>Назва дисципліни</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Course_name', true);
            echo $my_custom_field;

            echo "<h5>Вид дисципліни</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Course_type', true);
            echo $my_custom_field;

            echo "<h5>Блок дисципліни </h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Course_category', true);
            echo $my_custom_field;

            echo "<h5>Кількість студентів</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Number_of_students', true);
            echo $my_custom_field;

            echo "<h5>Курс/Семестр</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Semester_number', true);
            echo $my_custom_field;

        ?>
        </div>
        <h4>Загальна інформація про дисципліну</h4>
        <?php
            echo "<h5>Анотація</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Annotation', true);
            echo $my_custom_field;
        
            echo "<h5>Анотація</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Goal_and_tasks', true);
            echo $my_custom_field;

            echo "<h5>Анотація</h5>";

            $my_custom_field = get_post_meta(get_the_ID(), 'Lessons_and_control_types', true);
            echo $my_custom_field;
            echo "<h5>Розподіл часу</h5>";
            echo "<div>";
            echo "<b>Загальний обсяг (кредитів)</b>: ";
            $my_custom_field = get_post_meta(get_the_ID(), 'Credits_number', true);
            echo $my_custom_field;

            echo "; <b>Лекції (занять)</b>: ";
            $my_custom_field = get_post_meta(get_the_ID(), 'Lectures_lessons', true);
            echo $my_custom_field;

            echo "; <b>Лабораторні (занять)</b>: ";
            $my_custom_field = get_post_meta(get_the_ID(), 'Laboratory_lessons', true);
            echo $my_custom_field;

            echo "; <b>Практичні (занять)</b>: ";
            $my_custom_field = get_post_meta(get_the_ID(), 'Practics_lessons', true);
            echo $my_custom_field;

            echo "; <b>Самостійна робота (годин): </b>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Self-study', true);
            echo $my_custom_field;

            echo "</div>";

            echo "<h5>Попередні дисципліни</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Previous_courses', true);
            echo $my_custom_field;

            echo "<h5>Матеріально-технічне та програмне забезпечення дисципліни</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Course_support', true);
            echo $my_custom_field;
        ?>

        <?php 
            echo "<h5>Структура дисципліни</h5>";
            echo "<div class = 'table_structure'>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Course_structure', true);
            echo $my_custom_field;
            echo "</div>";

            echo "<h5>Теми та завдання для самостійної роботи</h5>";
            echo "<div class = 'table_self_study'>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Self_study_tasks', true);
            echo $my_custom_field;
            echo "</div>";


            echo "<h5>Проєкт</h5>";
            echo "<div class = 'table_project'>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Course_project', true);
            echo $my_custom_field;
            echo "</div>";


            echo "<h5>Рекомендовані джерела інформації та навчальні матеріали</h5>";
            echo "<div class = 'table_literature'>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Literature', true);
            echo $my_custom_field;
            echo "</div>";

            echo "<h5>Контрольні заходи</h5>";
            echo "<div class = 'table_assessment'>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Assessment', true);
            echo $my_custom_field;
            echo "</div>";

            echo "<h5>Результати навчання</h5>";
            echo "<div class = 'table_result'>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Results', true);
            echo $my_custom_field;
            echo "</div>";
        ?>
        <h4>Зв'язок з ринком праці</h4>
        <?php
            echo "<div>";
            echo "<h5>Спеціальність/професія, підготовці до діяльності в якій читається курс:</h5>";

            $my_custom_field = get_post_meta(get_the_ID(), 'Profession', true);
            if ($my_custom_field == 'Інше'){
                $my_custom_field = get_post_meta(get_the_ID(), 'other_prof', true);
            }
            echo $my_custom_field;

            echo "<h5>Посилання на вакансії (понад 3),</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Vacancies', true);
            echo $my_custom_field;

            echo "<h5>Перелік компетентностей із вказаних як вимоги до вакансії, які набувають студенти, в процесі проходження дисципліни.</h5>";
            $my_custom_field = get_post_meta(get_the_ID(), 'Jobs_competencies', true);
            echo $my_custom_field;


            echo "</div>";
        ?>
        <h4>Інструменти оцінювання результатів навчання за дисципліною</h4>
        <?php

        echo "<div class = 'table_assessment_tools'>";
            $my_custom_field = get_post_meta(get_the_ID(), 'assessment_tools', true);
            echo $my_custom_field;

            echo "</div>";
?>
              </div>

        <?php
          while ( have_posts() ) :

            the_post();
            get_template_part( 'template-parts/content', 'post');

            wp_link_pages(
              array(
                'before' => '<div class="project-management-pagination">',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>'
              )
            );

            comments_template();
          endwhile;
        ?>
      </div>
      <div class="col-lg-4 col-md-4">
        <?php get_sidebar(); ?>
      </div>
      <?php } elseif(get_theme_mod('project_management_single_post_sidebar_layout', 'Right Sidebar') == 'Left Sidebar'){ ?>
      <div class="col-lg-4 col-md-4">
        <?php get_sidebar(); ?>
      </div>
      <div class="col-lg-8 col-md-8 mt-5">
        <?php
          while ( have_posts() ) :

            the_post();
            get_template_part( 'template-parts/content', 'post');

            wp_link_pages(
              array(
                'before' => '<div class="project-management-pagination">',
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>'
              )
            );

            comments_template();
          endwhile;
        ?>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

</div>
	
<div style="text-align: center; margin: 30px 0;">
  <button id="download-pdf" class="btn btn-primary">Зберегти як PDF</button>
</div>

<?php get_footer(); ?>