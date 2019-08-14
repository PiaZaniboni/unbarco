
	$(window).load(function(e) {

        var url = "";

        $('.delete-link').on('click', function(event){
            event.preventDefault();
            url = $(this).attr("href");
            $('.modal-confirmation').modal('show');
        });

        $('.delete-yes').on('click', function(event){
            event.preventDefault();
            window.location = url;
        });

        $('.delete-no').on('click', function(event){
            event.preventDefault();
            $('.modal-confirmation').modal('hide');
        });

        if($('select[name="id_category"]').val() === "1"){
            $('div.description').show();
			$('div.description_ingles').show();
        } else {
            $('div.description').hide();
			$('div.description_ingles').hide();
        }

        $('select[name="id_category"]').on('change', function(event){
            if($(this).val() === "1"){
                $('div.description').show();
				$('div.description_ingles').show();
            } else {
                $('div.description').hide();
				$('div.description_ingles').hide();
            }
        });

        function wrapText(openTag, closeTag) {
            var textArea = $('form textarea');
            var len = textArea.val().length;
            var start = textArea[0].selectionStart;
            var end = textArea[0].selectionEnd;
            var selectedText = textArea.val().substring(start, end);
            var replacement = openTag + selectedText + closeTag;
            textArea.val(textArea.val().substring(0, start) + replacement + textArea.val().substring(end, len));
        }

        $(document).on("click", ".btn-es", function(event){
            event.preventDefault();
            wrapText('<p class="txt-es">', "</p>");
        });

        $(document).on("click", ".btn-en", function(event){
            event.preventDefault();
            wrapText('<p class="txt-en">', "</p>");
        });

        /*$('.btn-es').on('click', function(event){
            event.preventDefault();
            console.log(getSelectedText($("form textarea")));
        });*/

    });
