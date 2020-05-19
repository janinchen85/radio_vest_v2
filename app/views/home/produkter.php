<section class="produkter" id="produkter" name="produkter">
   <div class="produktCategories">
      <div class="produktCategoryMobile">
        <div class="produktImg" id="pro0">
            <div class="prodImg" id="actImg"><img class="act" src="./img/produkter.png"></div>
            <div class="prodName"><p class="act" id="actText">Produkter</p></div>
         </div>
         <div class="produktDrop">
            <a href="javascript:void(0)" onclick="productMobile()"><div class="triangle"></div></a>
         </div>
         <div class="hide" id="mobile">{$prodItems}</div>
      </div>
      <div class="produktCategory">
         {$prodItems}
      </div>
   </div>
   <div class="infos">
      <div class="aboutText"  id="aboutText">
         <div class="textSide">
            <h2>{$aboutTitle}</h2>
            <p>{$aboutText}</p>
         </div>
      </div>
      <div class="produktText hide" id="produktText">
          {$prodInfo}
      </div>
      <div class="medarbejderInfo" id="group">
         <div class="group">
            <div class="groupIMG">
               <img src="./img/carsten.png">
            </div>
            <div class="groupIMG">
               <img src="./img/jan.png">
            </div>
            <div class="groupIMG">
               <img src="./img/jacob.png">
            </div>
            <div class="groupIMG">
               <img src="./img/lars.png">
            </div>
         </div>
      </div>
      <div class="produktMedarbejderInfo hide" id="info">
         {$medarbejderInfo}
      </div>
   </div>
</section>