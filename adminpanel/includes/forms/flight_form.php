<fieldset>
    <div class="form-group">
        <label for="fno">Flight no *</label>
          <input type="text" name="fno" value="<?php echo $edit ? $customer['fno'] : ''; ?>" placeholder="Flight Number" class="form-control" required="required" id = "fno" >
    </div> 
    <div class="form-group">
        <label for="from_city">From City *</label>
          <input type="text" name="from_city" value="<?php echo $edit ? $customer['from_city'] : ''; ?>" placeholder="From City" class="form-control" required="required" id = "from_city" >
    </div> 

    <div class="form-group">
        <label for="to_city">To City *</label>
        <input type="text" name="to_city" value="<?php echo $edit ? $customer['to_city'] : ''; ?>" placeholder="To City" class="form-control" required="required" id="to_city">
    </div> 

    

    <div class="form-group">
        <label for="departure_date">Departure Date</label>
          <input name="departure_date" value="<?php echo $edit ?  date('Y-m-d', strtotime($customer['departure_date'])) : ''; ?>" placeholder="dd-mm-yyyy" class="form-control" type="date" id="departure_date">
    </div> 

    
    <div class="form-group">
        <label for="arrival_date">Arrival date</label>
            <input  type="date" name="arrival_date" value="<?php echo $edit ? date('Y-m-d', strtotime($customer['arrival_date'])) : ''; ?>" placeholder="Arrival date" class="form-control" id="arrival_date">
    </div>

    <div class="form-group">
        <label for="departure_time">Departure time</label>
            <input name="departure_time" value="<?php echo $edit ? $customer['departure_time'] : ''; ?>" placeholder="HOUR:MINUTE" class="form-control"  type="text" id="departure_time">
    </div> 
    <div class="form-group">
        <label for="arrival_time">Arrival time</label>
            <input name="arrival_time" value="<?php echo $edit ? $customer['arrival_time'] : ''; ?>" placeholder="HOUR:MINUTE" class="form-control"  type="text" id="arrival_time">
    </div> 

    <div class="form-group">
        <label for="e_seats_left">Economy Class Seat</label>
            <input name="e_seats_left" value="<?php echo $edit ? $customer['e_seats_left'] : ''; ?>" placeholder="Left Seats" class="form-control"  type="text" id="e_seats_left">
    </div> 
    <div class="form-group">
        <label for="b_seats_left">Business Class Seat</label>
            <input name="b_seats_left" value="<?php echo $edit ? $customer['b_seats_left'] : ''; ?>" placeholder="Left Seats" class="form-control"  type="text" id="b_seats_left">
    </div>
     <div class="form-group">
        <label for="e_price">Economy Class Price</label>
            <input name="e_price" value="<?php echo $edit ? $customer['e_price'] : ''; ?>" placeholder="Price" class="form-control"  type="number" id="e_price">
    </div> 
    <div class="form-group">
        <label for="b_price">Business Class Price</label>
            <input name="b_price" value="<?php echo $edit ? $customer['b_price'] : ''; ?>" placeholder="Price" class="form-control"  type="number" id="b_price">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>            
</fieldset>