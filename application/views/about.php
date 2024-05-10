<?php
// $theme_url = $baseurl . "theme/";
// echo $theme_url . "css/plugins.css";
$theme_url = theme_url();
$root_url = root_url();
$base_url = base_url();
$images_url = $base_url."images/";

?>
<!DOCTYPE html>
<html lang="zxx">
<?php
pageheader();
?>

<body>
    <div class="site-wrapper" id="top">
        <div class="site-header d-none d-lg-block" style="padding-top:10px">
            <?php topnav(); ?>
        </div>

        <?php // site mobile menu;
         header_top_area();
        topnav_mobile();
        topnav_flex();
        breadCrumb("About");
        ?>

        <main class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="row  mb--60">
                    <div class="col-md-12">
 <hr />
                    <p align="center">          
              <h4>The Reclusive Writer With a Mighty Pen <br>Ciugu Mwagiru (The Daily Nation)</h4>
              <h4>...</h4>
<p>Mwangi’s keen eye for the drama and humor in everyday rural life
in Kenya shines throughout his work. Striving for the Wind, set in
the drought years of the 1980s, contrasts a traditional farmer, who is
dependent on oxen for plowing, with a wealthy neighbor whose imported
tractor is incapacitated during a global petrol crisis. While this novel is
suitable for young adults, it does not shy away from some painful
realities. It includes the seduction of a young schoolgirl by a rich old man,
and when the young girl becomes pregnant, his son says that he will
marry her in his father’s place.</p>

<p>Other themes that are common to all his works are the difficulties young
educated Kenyans face when trying to return to their rural homes to
apply their learning and the impact of corrupt officials on the lives of the
poor. The young adult novel The Last Plague, which won Mwangi his
third Jomo Kenyatta Prize for Literature in 2001, offers a seldom-heard
African male perspective on the impact of HIV/AIDS in rural areas. Again,
it features a well-educated, well-meaning young man facing many
obstacles as he tries to set up his veterinary practice in a small, dying
town.  Mwangi’s tremendous concern for the poor and disadvantaged—
and his prescriptions for how they could really be helped—resonate
throughout the novel.</p>
<p>Mwangi continues to be a prolific writer. His latest novel, The Boy Gift,
will be released in 2006. Suitable for adults and young adults alike, it is
about the confusion caused by the birth of a light-skinned, green-eyed
baby in the Bush Hospital. While political aspirations and intrigue
surround the birth of the boy, at the emotional and psychological levels
the author explores a community’s reaction to the strange and
inexplicable</p>
      
<hr />
<br />
<h4>Dunford Kagiri (The Daily Nation)</h4>
<p>Masculinity is threatened as women take more political and social visibility >Meja Mwangi's <a href="<?php  echo $root_url."product/3" ?>"> Rafiki Man Guitar</a></p>
</div>
                </div>
                <?php
                
                ?>


            </div>
            <?php
            // relatedProductsArea();
            //    brandArea();
            footer();
            footerJSScripts();
            ?>
</body>

</html>
