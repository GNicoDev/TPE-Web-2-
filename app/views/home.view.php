<?php

class HomeView {

    function showHome(){
        require 'templates/header.phtml';

        
       ?>
       <section class="btns-index">
       <ul>
           <a href=""><li>Ver ofertas</li></a>
           <a href=""><li>Sign-in</li></a>
       </ul>
   </section>

        <?php require 'templates/footer.phtml';
    }
}