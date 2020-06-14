<?php
/* Define these, So that WP functions work inside this file */
define('WP_USE_THEMES', false);
require( $_SERVER['DOCUMENT_ROOT'] .'/wp-blog-header.php');
?>
<?php
if(isset($_POST['submit'])) {
    $post_title = 'Поступила новая заявка с сайта "Херсон-Центр"';    
    $post_content =
        '<table>
            <tbody>
                <tr>
                    <td><strong>Имя:</strong></td>
                    <td>' . esc_attr($_POST["name"]) . '</td>
                </tr>
                <tr>
                    <td><strong>Номер телефона</strong></td>
                    <td>' . esc_attr($_POST["tel"]) . '</td>
                </tr>
                <tr>
                    <td><strong>E-mail</strong></td>
                    <td>' . esc_attr($_POST["email"]) . '</td>
                </tr> 
                <tr>
                    <td><strong>Комментарий</strong></td>
                    <td>' . esc_attr($_POST["comment"]) . '</td>
                </tr> 
                <tr>
                    <td><strong>Тип недвижимости</strong></td>
                    <td>' . esc_attr($_POST["type"]) . '</td>
                </tr>
                <tr>
                    <td><strong>Тип сделки</strong></td>
                    <td>' . esc_attr($_POST["deal"]) . '</td>
                </tr>';

    if ($_POST["place"] == 'kh_region') {
        $post_content .= 
                '<tr>
                    <td><strong>Местоположение</strong></td>
                    <td>Херсон</td>
                </tr>
                <tr>
                    <td><strong>Район Херсона</strong></td>
                    <td>' . esc_attr($_POST["kh_region"]) . '</td>
                </tr>';        
    }
    if ($_POST["place"] == 'region_place') {
        $post_content .= 
                '<tr>
                    <td><strong>Местоположение</strong></td>
                    <td>Херсонская обл.</td>
                </tr>
                <tr>
                    <td><strong>Направление области</strong></td>
                    <td>' . esc_attr($_POST["region_place"]) . '</td>
                </tr>';                       
    }
    if (!empty($_POST["rooms"])) {
         $post_content .=                 
                '<tr>
                    <td><strong>Количество комнат</strong></td>
                    <td>' . esc_attr($_POST["rooms"]) . '</td>
                </tr>';
    }
    $post_content .=                 
                '<tr>
                    <td><strong>Площадь</strong></td>
                    <td>' . esc_attr($_POST["square"]) . '</td>
                </tr>
                <tr>
                    <td><strong>Стоимость</strong></td>
                    <td>' . esc_attr($_POST["price"]) . '</td>
                </tr>                
            </tbody>
        </table>'; 
    $headers[] = 'From: Херсон-Центр <noreply@realty.ua>';
    $headers[] = 'content-type: text/html';
    $email = get_bloginfo('admin_email');
    wp_mail( $email, $post_title, $post_content, $headers); 
    $page = get_page(38);
    wp_redirect($page->guid);

}
?>

