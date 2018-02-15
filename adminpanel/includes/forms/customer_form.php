<fieldset>
    <div class="form-group">
        <label for="f_fname">First Name *</label>
          <input type="text" name="f_fname" value="<?php echo $edit ? $customer['f_fname'] : ''; ?>" placeholder="First Name" class="form-control" required="required" id = "f_fname" >
    </div> 

    <div class="form-group">
        <label for="f_lname">Last name *</label>
        <input type="text" name="f_lname" value="<?php echo $edit ? $customer['f_lname'] : ''; ?>" placeholder="Last Name" class="form-control" required="required" id="f_lname">
    </div> 

    <div class="form-group">
        <label>Gender * </label>
        <label class="radio-inline">
            <input type="radio" name="f_sex" value="Male" <?php echo ($edit &&$customer['f_sex'] =='Male') ? "checked": "" ; ?> required="required"/> Male
        </label>
        <label class="radio-inline">
            <input type="radio" name="f_sex" value="Female" <?php echo ($edit && $customer['f_sex'] =='Female')? "checked": "" ; ?> required="required" id="female"/> Female
        </label>
    </div>

    <div class="form-group">
        <label for="f_address">Address</label>
          <input name="f_address" value="<?php echo $edit ? $customer['f_address'] : ''; ?>" placeholder="Address" class="form-control" type="text" id="f_address">
    </div> 

      
    <div class="form-group">
        <label for="f_mailid">Email</label>
            <input  type="email" name="f_mailid" value="<?php echo $edit ? $customer['f_mailid'] : ''; ?>" placeholder="E-Mail Address" class="form-control" id="f_mailid">
    </div>

    <div class="form-group">
        <label for="f_phone">Phone</label>
            <input name="f_phone" value="<?php echo $edit ? $customer['f_phone'] : ''; ?>" placeholder="987654321" class="form-control"  type="text" id="f_phone">
    </div> 

    <div class="form-group">
        <label>UserName</label>
        <input name="f_uname" value="<?php echo $edit ? $customer['f_uname'] : ''; ?>"  placeholder="Username" class="form-control" <?php echo $edit ? 'readonly="readonly"' : ''; ?>   type="text">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>