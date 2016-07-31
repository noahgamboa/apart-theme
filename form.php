<form class="cmxform" id="contactForm" method="post" action="<?php echo bloginfo('template_url') ?>/submit.php">
  <fieldset>
    <legend>Please provide your name, email address (won't be published) and a comment</legend>
    <p>
      <label for="cname">Name</label>
      <input id="cname" name="name" minlength="2" type="text" required>
    </p>
    <p>
      <label for="cemail">E-Mail</label>
      <input id="cemail" type="email" name="email" required>
    </p>

    <p>
      <label for="cphone">Phone</label>
      <input id="cphone" type="text" name="phone">
    </p>
    <p>
        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
<div class="g-recaptcha" data-sitekey="6LdOBiUTAAAAACg4YPrDtLB7BBBSaar1ASaNmiQs"></div>
    </p>
    <p>
      <label for="ccomment">Your message</label>
      <textarea id="ccomment" name="comment" minlength="100" required></textarea>
    </p>
    <br>
    <p>
      <input class="submit" type="submit" value="Submit">
    </p>
  </fieldset>
</form>


