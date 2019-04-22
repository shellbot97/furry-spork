
 function validate_card_name(card_name) {
      return /^[a-zA-Z0-9 ]{0,30}$/.test(card_name);
    }
    function validate_first_6_digits(first_6_digits) {
      return /^[0-9]{6}$/.test(first_6_digits);
    }
    function validate_last_4_digits(last_4_digits) {
      return /^[0-9]{4}$/.test(last_4_digits);
    }
    function validate_month(expiry_month) {
      return /^(0?[1-9]|1[012])$/.test(expiry_month);
    }
    function validate_year(expiry_year) {
      return /^20(1[9]|[2-9][0-9])$/.test(expiry_year);
    }
    function validate_cur_date(date) {
      var now = new Date();
      var selectedDate = new Date(date);
      now.setHours(0,0,0,0);
      if (selectedDate < now) {
        return false;
      } else {
        return true;
      }
    }