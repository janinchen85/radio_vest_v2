<section class="cont" id="contact">
    <div class="contactMobile">
        <div class="slideBG">
            <ul class="cb-slideshow">
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
            </ul>
        </div>
        <div class="contact">
            <div class="top">
                <h1 class="highlight">Kontakt os</h1>
            </div>
            <div class="form-area">
            <form role="form" action='' method='POST' name="contact_form" id="contact_form">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                </div>
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="{$siteKey}"></div>
                </div>
                <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
            </form>
        </div>
        <div class="bottom"></div>
    </div>
    </div>
    <div class="contactD">
        <div class="slideBG">
            <ul class="cb-slideshow">
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
                <li><span></span></li>
            </ul>
        </div>
        <div class="contact">
            <div class="top">
                <h1>Kontakt Os</h1></div>
            <div class="form-area {$hideForm}">
                <form role="form" method='POST' name="contact_form" id="contact_form">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="{$name}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="{$email}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mobile" name="phone" placeholder="{$phone}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="{$subject}" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" type="textarea" id="text" placeholder="{$text}" maxlength="140" rows="7"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="{$siteKey}"></div>
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
                </form>
            </div>
            <div class="bottom"></div>
        </div>
    </div>
</section>