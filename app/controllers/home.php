<?php
class Home extends Controller{

    public function index(){
        /* init */
        $index = $this->heading();
        $this->setTitle("EURONICS GROUP - RADIO VEST TARM");
        /*#######################################*/
        /* set TPLs */
        $index->assign("home", $this->setTpl("home/home")->replace());
        $index->assign("produkter", $this->setTpl("home/produkter")->replace());
        $index->assign("contact", $this->setTpl("home/contact")->replace());
        $index->assign("findOs", $this->setTpl("home/findos")->replace());
        /*#######################################*/
        /* reCaptcha & contact setting */
        $siteKey = "6LewinQUAAAAACj29ef3eJB0khqyUIqWXUh7eouD";
        $siteSecret = "6LewinQUAAAAAEN4CmUJ3j_jO4qGlfPb-BLfzYfk";
        $siteEmail = "janinacindy@gmail.com";
        $subjectText = "";
        $sendHTML = true;
        $mailLog = true;
        $submitMsg = "";
        $thxMsg = "";
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        // this sanitizes all gets/posts for security
        $index->assign("siteKey", $siteKey);
        $nameStart = "Navn";
        $index->assign("name", $nameStart);
        $index->assign("email", "Email");
        $index->assign("phone", "Telefonnummer");
        $index->assign("subject", "Emne");
        $index->assign("text", "Text");
        if(isset($_POST['submit'])){
            $_GET  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $_POST = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
            $response = file_get_contents($url."?secret=".$siteSecret.
                                               "&response=".$_POST["g-recaptcha-response"].
                                               "&remoteip=".$_SERVER['REMOTE_ADDR']);
            $data = json_decode($response);
            if(isset($data->success) AND $data->success == true){
                $name       = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                $email      = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
                $phone      = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
                $subject    = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
                $text       = filter_var($_POST['text'], FILTER_SANITIZE_STRING);   
                $header = array(
                    'From' => $email,
                    'Reply-To' => $email,
                    'X-Mailer' => 'PHP/' . phpversion()
                );

                mail("$siteEmail", $subject, $text, $header);
               
            } else {
                // error recaptcha
            }
        }
        /* Facebook Reading SetUp */
        $fb_page_id = "NeedleSorcery";
        $profile_photo_src = "https://graph.facebook.com/{$fb_page_id}/picture?type=square";
        $access_token = "EAAOZCAfylwZAQBABN2h42lF0er5VvmrKrZCvD3jndZBzWTjhr7RjpDy2kz13AvVKts02wBfzayUsy6uBspaCzSEWe0ow4698ueXnb5skmt78TSZBTYm14UFH86KCi4uWwqoZC9xkeH5Jr5Kpdj9pJ5WNICT7LyE09WTjv3lIJoZChC1boCSnFh1";
        $fields = "message,attachments";
        $limit = 3;
        $json_link = "https://graph.facebook.com/{$fb_page_id}/feed?access_token={$access_token}&fields={$fields}&limit={$limit}";
        $json = file_get_contents($json_link);
        $result = json_decode($json, true);
        $feed_item_count = count($result['data']);
        /*#######################################*/
        /* Facebook getData */
        if (isset($result['data'][0]['message'])){
            $newsText = $result['data'][0]['message'];
            $newsText = str_replace("\n", "<br>", $newsText);
            $newsText = $this->makeLink($newsText);
            $newsText = $this->remove_emoji($newsText);
        } else {
            $newsText = "";
        }
        if (isset($result['data'][0]['attachments'])){
            $media = $result['data'][0]['attachments']['data'][0]['target']['url'];
        } else {
            $media = "";
        }

        if (strpos($media, 'videos') !== false) {
            $newsMedia = "<div class=\"fb-video\" data-href=\"" .$media. "\" data-width=\"500\" data-allowfullscreen=\"true\"></div><br><br>";
        } else {
            $media = $result['data'][0]['attachments']['data'][0]['media']['image']['src'];
            $newsMedia = "<img src=".$media." class=\"img-fluid img-thumbnail\">";
        } 
        /*#######################################*/
        /* Read XML Data->Home */
        $homeData   = $this->model('data')->getxmlFile("home");
        $brand      = $homeData->_xml->xpath('//brand');
        $storeName  = $homeData->_xml->xpath('//storeName');
        $slogan     = $homeData->_xml->xpath('//slogan');
        $navItems   = $homeData->_xml->xpath('//navitem');
        $attributes = $homeData->_xml->xpath('//attribute');
        foreach($navItems as $navItem){
            $navigation   = $this->setTpl("style/navigation");
            $navigation->assign("navItem", $navItem);
            $nav[]    = $navigation;
        }
        $navItems = tpl::merge($nav);
        foreach($attributes as $attribute){
            $attrs   = $this->setTpl("home/attributes");
            $attrs->assign("attrImage", $attribute->attrImage);
            $attrs->assign("attrName", $attribute->attrName);
            $attrs->assign("attrText", $attribute->attrText);
            $attr[]    = $attrs;
        }
        $attrItems = tpl::merge($attr);
        /* Data assign */
        $index->assign("brand", $brand[0]);
        $index->assign("storeName", $storeName[0]);
        $index->assign("slogan", $slogan[0]);
        $index->assign("navItems", $navItems);
        $index->assign("newsText", $newsText);
        $index->assign("newsMedia", $newsMedia);
        $index->assign("attributes", $attrItems);
        /*#######################################*/
        /* Read XML Data->Product Categories */
        $prodCategories = $this->model('data')->getxmlFile("prodCategories");
        $prodCats       = $prodCategories->_xml->xpath('//prodItem');
        $aboutTitle     = $prodCategories->_xml->xpath('//aboutTitle');
        $aboutText      = $prodCategories->_xml->xpath('//aboutTxt');
        $countCat       = count($prodCats);
        foreach($prodCats as $prodCat){
            $prodCatI   = $this->setTpl("home/prodCategories");
            $prodCatI->assign("prodImage", $prodCat->prodIMG);
            $prodCatI->assign("prodTitle", $prodCat->prodTitle);
            $prodCatI->assign("prodID", $prodCat->attributes()->id);
            $prodCatI->assign("prodsAll", $countCat);
            $pCats[]    = $prodCatI;
        }
        $prodCatItems = tpl::merge($pCats);
        /* Data assign */
        $index->assign("prodItems", $prodCatItems);
        $index->assign("aboutTitle", $aboutTitle[0]);
        $index->assign("aboutText", $aboutText[0]);
        /*#######################################*/
        /* Read XML Data->Product Infos */
        $prodInformations = $this->model('data')->getxmlFile("productInfos");
        $medarbejderInfo  = $this->model('data')->getxmlFile("medarbejder");
        $medInfos = $medarbejderInfo->xpath("//medarbejder");
        $medAll = count($medInfos);
        $products         = $prodInformations->_xml->xpath('//product');
        for($i = 0; $i < $countCat; $i++){
            $prodInfo      = $this->setTpl("home/prodInfo");
            $prodInfo->assign("infoID", $products[$i]->attributes()->id);
            $prodInfo->assign("prodTitle", $products[$i]->productTitle);
            $prodInfo->assign("prodInfoText", $products[$i]->productText);
            $prodInfo->assign("medRow", "{\$medRow".($i+1)."}");
                for($n = 0 ; $n < $products[$i]->medantal; $n++){
                    $medarbejder   = $this->setTpl("home/medarbejderRow");
                    $medIDs = explode(",", $products[$i]->medids);
                    $arbejders = $medarbejderInfo->xpath("//medarbejder[@id=".$medIDs[$n]."]");
                    foreach($arbejders as $arbejder){
                        $medarbejder->assign("medName", $arbejder->navn);
                        $medarbejder->assign("medImage", $arbejder->smallIMG);
                        $medarbejder->assign("medID", $medIDs[$n]);
                        $medarbejder->assign("medAll", $medAll);
                    }
                    $medarbejderRow[$i][] = $medarbejder;
                    $medarbejderContents = tpl::merge($medarbejderRow[$i]);
                }
            $prodInfo->assign("medRow".($i+1), $medarbejderContents);
            $prodInfos[]    = $prodInfo;
        }        
        $prodInfosItems = tpl::merge($prodInfos);
        $index->assign("prodInfo", $prodInfosItems);
        /*#######################################*/
        /* Read XML Data->Medarbejder Infos */
        $medInfos = $medarbejderInfo->xpath("//medarbejder");
        foreach($medInfos as $medInfo){
            $meds   = $this->setTpl("home/medarbejderInfo");
            $meds->assign("id",$medInfo->attributes()->id);
            $meds->assign("medarbejderNavn",$medInfo->navn);
            $meds->assign("medarbejderText",$medInfo->text);
            $meds->assign("email",$medInfo->email);
            $meds->assign("phone",$medInfo->telefon);
            $meds->assign("bigImg",$medInfo->bigIMG);
            $medsInfos[] = $meds;
        }
        $medsInfoItems = tpl::merge($medsInfos);
        $index->assign("medarbejderInfo",$medsInfoItems);
        /*#######################################*/
        $index->assign("root", $this->getRoot());
        /*#######################################*/
        $this->setView();
    }
}
?>