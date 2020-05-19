<section class="home" id="home">
   <div class="headline">
      <div class="egroup">
         <img src="./img/s{$brand}">
      </div>
      <div class="storeName">
         <p>{$storeName}</p>
      </div>
   </div>
   <div class="slogLine">
      <h2>{$slogan}</h2>
   </div>
   <div class="navigationLine">
      <div class="w3-cell-row navbar" id="navbar">
         <div class="w3-container w3-cell w3-cell-middle w3-center">
            <div class="w3-bar nav" id="nav">
               <a href="#home"      id="item1" class="w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll active">Forside</a>
               <a href="#produkter" id="item2" class="w3-hide-small w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll">Produkter</a>
               <a href="#"          id="item3" class="w3-hide-small w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll">Opret din PC</a>
               <a href="#produkter" id="item4" class="w3-hide-small w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll">Om Os</a>
               <a href="#contact"   id="item5" class="w3-hide-small w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll">Contact</a>
               <a href="#findos"    id="item6" class="w3-hide-small w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll">Find Os</a>
               <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-xlarge w3-hide-large w3-hide-medium w3-hover-custom-orange mobile" onclick="toggle()">&#9776;</a>
            </div>
            <div id="navi" class="w3-bar-block nav w3-hide w3-hide-large w3-hide-medium">
               <a href="#home"       id="mItem1" class="w3-hide-small w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll" onclick="hide('1')">Forside</a>
               <a href="#produkter"  id="mItem2" class="w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll" onclick="hide('2')">Produkter</a>
               <a href="#"           id="mItem3" class="w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll" onclick="hide('3')">Opret din PC</a>
               <a href="#produkter"  id="mItem4" class="w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll" onclick="hide('4')">Om Os</a>
               <a href="#contact"    id="mItem5" class="w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll" onclick="hide('5')">Contact</a>
               <a href="#findos"     id="mItem6" class="w3-bar-item w3-button w3-xlarge w3-hover-custom-orange smoothScroll" onclick="hide('6')">Find Os</a>
            </div>
         </div>
      </div>
   </div>
   <div class="fbLine">
      <div class="fbText">
         <h3>Nyheder</h3>
         <p>{$newsText}</p>
         <a href="https://www.facebook.com/RadioVestTarm" target="blank" title="Facebook" class="btn btn-facebook btn-lg"><i class="fa fa-facebook fa-fw"></i> Facebook</a>
      </div>
      <div class="fbImage">{$newsMedia}</div>
   </div>
   <div class="attrLine">
      {$attributes}
   </div>
</section>