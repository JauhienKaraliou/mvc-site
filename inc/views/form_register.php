<form class="form-horizontal" method="post">
    <fieldset>

        <!-- Form Name -->
        <legend>For registration fill the form</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Your name</label>
            <div class="col-md-5">
                <input id="name" name="name" type="text" placeholder="Иванов Иван" class="form-control input-md"
                       required="" value="">
                <p class="help-block" data-name="name"></p>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Your email</label>
            <div class="col-md-5">
                <input id="email" name="email" type="text" placeholder="ivanov@ivan.com" class="form-control input-md"
                       required="" value="">
                <p class="help-block" data-name="email"></p>
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">Enter password</label>
            <div class="col-md-5">
                <input id="password" name="password" type="password" placeholder="" class="form-control input-md"
                       required="">
                <p class="help-block" data-name="password"></p>
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="passwordrepeat">Repeat password</label>
            <div class="col-md-5">
                <input id="passwordrepeat" name="passwordrepeat" type="password" placeholder=""
                       class="form-control input-md" required="">
                <p class="help-block" data-name="passwordrepeat"></p>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="about_me">About you</label>
            <div class="col-md-5">
                <textarea class="form-control" id="about_me" name="aboutMe"
                          placeholder="Я начинающий программист ..."></textarea>
            </div>
        </div>

        <!-- Prepended text-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="captcha"></label>
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-addon">{{CAPTCHA}} =</span>
                    <input id="captcha" name="captcha" class="form-control" placeholder="Введите ответ"
                           type="text" required="">
                </div>
                <p class="help-block" data-name="captcha"></p>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="Register"></label>
            <div class="col-md-4">
                <input id="Register" type="submit" name="action" value="Register" class="btn btn-info">
            </div>
        </div>

    </fieldset>
</form>
