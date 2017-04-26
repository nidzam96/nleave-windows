function getCookie(name) {
    var cookieValue = null;
    if (document.cookie && document.cookie != '') {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = jQuery.trim(cookies[i]);
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) == (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}

function bootstrap_alert(elem, message, timeout) {
    $(elem).show().html('<div class="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>'+message+'</span></div>');

    if (timeout || timeout === 0) {
        setTimeout(function() {
            $(elem).alert('close');
        }, timeout);
    }
}

function ListRadioToggle(parent) {
    var list_radios = null;

    if (parent == null) {
        list_radios = $('.list-radios');
    }
    else {
        list_radios = parent.find('.list-radios');
    }

    // Radioboxes switch entry visibility
	list_radios.each(function() {
		$(this).find('input.toggle-hide-control').on('change', function() {
			var $input = $(this)
			var parent = $input.parents('.form-controls');

			if ($input.val() == 'True') {
				parent.find('.form-field-days').prop('readonly', false);
				parent.find('.form-field-days').removeClass('disable');
				parent.find('span.field-text').removeClass('disable');
				parent.next().children('.btn-custom-entitlement').prop('disabled', true);
			}
			else {
				parent.find('.form-field-days, span.field-text').prop('readonly', true);
				parent.find('.form-field-days').addClass('disable');
				parent.find('span.field-text').addClass('disable');
				parent.next().children('.btn-custom-entitlement').prop('disabled', false);
			}
		});
	});
}

; (function ($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);

    //helper function to check the start and end date from two DatePicker control

	$doc.ready(function () {

		$('.set-inner').on('click', function (event) {
			var $this = $(this);
			var $next = $this.next();

			$this.slideUp();
			$next.slideDown();

			setTimeout(function() {
				$next.find('.form-head').addClass('expanded');
			}, 500);

		});

		// Custom Bootstrap Selectbox
		$('.select').selectpicker();

		// Tooltip
		$('[data-toggle="tooltip"]').tooltip();

		ListRadioToggle(null);

	    // Custom Accordion
		$('.acc-head').on('click', '.acc-title', function () {
		    var $this = $(this);

		    $this.closest('.acc-head').toggleClass('expanded');

		    if ($this.parents('.list-polcies').length && $this.parent().hasClass('form-head')) {
		        $this.parents('.form').slideUp()
                    .prev().slideDown();
		    }

		});


	});
})(jQuery, window, document);

//Fix the issue that bootstrap-select cannot work on IE8
//https://github.com/silviomoreto/bootstrap-select/issues/769

Object.keys = Object.keys || function(
    o, // object
    k, // key
    r  // result array
) {
    // initialize object and result
    r = [];
    // iterate over object keys
    for (k in o)
        // fill result array with non-prototypical keys
        r.hasOwnProperty.call(o, k) && r.push(k);
    // return result
    return r
};

// Export CSV with JS
function exportTableToCSV($table, filename) {
    var $rows = $table.find('tr:has(td), tr:has(th)');

    // Temporary delimiter characters unlikely to be typed by keyboard
    // This is to avoid accidentally splitting the actual contents
    var tmpColDelim = String.fromCharCode(11); // vertical tab character
    var tmpRowDelim = String.fromCharCode(0); // null character

    // actual delimiter characters for CSV format
    var colDelim = '","';
    var rowDelim = '"\r\n"';

    // Grab text from table into CSV formatted string
    csv = 'sep=, \n' ;
    csv += '"' + $rows.map(function (i, row) {
        var $row = $(row),
        $cols = $row.find('td, th');

        return $cols.map(function (j, col) {
            var $col = $(col),
            text = $col.text().trim();

            return text.replace(/"/g, '""'); // escape double quotes

        }).get().join(tmpColDelim);

    }).get().join(tmpRowDelim)
        .split(tmpRowDelim).join(rowDelim)
        .split(tmpColDelim).join(colDelim) + '"';

    // For Microsoft browsers
    if(window.navigator.msSaveOrOpenBlob) {
        blobObject = new Blob([csv]);
        window.navigator.msSaveOrOpenBlob(blobObject, filename);

        // For non-IE browsers
    } else {
        // Data URI
        csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

        $(this).attr({
            'download': filename,
            'href': csvData,
            'target': '_blank'
        });
    }
}

function CurrencyFormatted(amount) {
    var i = parseFloat(amount);
    if(isNaN(i)) { i = 0.00; }

    return i.toFixed(2);
}

function escapeRegExp(string){
  return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); // $& means the whole matched string
}
