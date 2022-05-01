Number.prototype.formatnum = function(n, x) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&.');
};

(function () {
    $(".sidebar .sidebar-menu li a").on("click", function () {
        var t = $(this);
        t.parent().hasClass("open") ? t.parent().children(".dropdown-menu").slideUp(200, function () {
            t.parent().removeClass("open")
        }) : (t.parent().parent().children("li.open").children(".dropdown-menu").slideUp(200), t.parent().parent().children("li.open").children("a").removeClass("open"), t.parent().parent().children("li.open").removeClass("open"), t.parent().children(".dropdown-menu").slideDown(200, function () {
            t.parent().addClass("open")
        }))
    }), $(".sidebar").find(".sidebar-link").each(function (t, i) {
        $(i).removeClass("active")
    }).filter(function () {
        var t = $(this).attr("href");
        return ("/" === t[0] ? t.substr(1) : t) === window.location.pathname.substr(1)
    }).addClass("active"), $(".sidebar-toggle").on("click", function (t) {
        $(".app").toggleClass("is-collapsed"), t.preventDefault()
    }), $("#sidebar-toggle").click(function (t) {
        t.preventDefault(), setTimeout(function () {
            window.dispatchEvent(window.EVENT)
        }, 300)
    })
})();



function initUpload(uploadSlector, wrap = "") {
    function readURL(input) {
        var result = "";

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                result = e.target.result;
                console.log(`${wrap} [data-target="${uploadSlector}"][data-content=uploadPreview]`)
                $(`${wrap} [data-target="${uploadSlector}"][data-content=uploadPreview]`).attr('src', result);
            }

            reader.readAsDataURL(input.files[0]);
        }

        return result;
    }

    $(uploadSlector).change(function (event) {
        readURL(this)
        if (this.files && this.files[0]) {
            $(`${wrap} [data-content=uploadPlus]`).hide()
        } else {
            $(`${wrap} [data-content=uploadPlus]`).show()
        }
    })
}


function initSEOPreview(wrap) {
    $(`${wrap} [data-action=changeMetaDesc]`).keyup(function () {
        $(`${wrap} [data-content=metaDesc]`).html($(this).val());
    })

    $(`${wrap} [data-action=changeMetaTitle]`).keyup(function () {
        $(`${wrap} [data-content=metaTitle]`).html($(this).val());
    })

    $(`${wrap} [data-action=createSlug]`).keyup(function () {
        $(`${wrap} [data-content=slug]`).html(slugify($(this).val()) + ".html");
    })
}

function initEditor(editorSelector, toolbarSelector, urlUpload = '') {
    DecoupledDocumentEditor.create( document.querySelector( editorSelector ), {
        removePlugins: [ 'Title' ],
        toolbar: {
            items: [
                'heading',
                '|',
                'link',
                'insertTable',
                'imageUpload',
                'blockQuote',
                'mediaEmbed',
                '|',
                'fontSize',
                'fontFamily',
                'fontBackgroundColor',
                'fontColor',
                'removeFormat',
                'superscript',
                'subscript',
                '|',
                'bold',
                'italic',
                'underline',
                'strikethrough',
                'highlight',
                '|',
                'alignment',
                '|',
                'numberedList',
                'bulletedList',
                '|',
                'indent',
                'outdent',
                '|',
                'todoList',
                'undo',
                'redo',
                'code',
                'specialCharacters',
                'pageBreak',
                'horizontalLine'
            ]
        },
        language: 'vi',
        image: {
            toolbar: [
                'imageTextAlternative',
                'imageStyle:full',
                'imageStyle:side',
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells',
                'tableCellProperties',
                'tableProperties'
            ]
        },
        
        // autosave: {
        //     save( editor ) {
        //         return saveData( editor.getData() );
        //     }
        // },
        simpleUpload: {
            uploadUrl: urlUpload,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        licenseKey: '',
        
    } )
    .then( editor => {
        window.editor = editor;

        // Set a custom container for the toolbar.
        document.querySelector( toolbarSelector ).appendChild( editor.ui.view.toolbar.element );
        document.querySelector( '.ck-toolbar' ).classList.add( 'ck-reset_all' );
    } )
    .catch( error => {
        console.error( 'Oops, something gone wrong!' );
        console.error( 'Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:' );
        console.warn( 'Build id: 9ousqw46n56k-oda5me7zgxdl' );
        console.error( error );
    });
}


$('[data-action=changeStatus]').change(function () {
    let id = $(this).attr('data-id');
    let isChecked = $(this).is(":checked");
    let value = isChecked ? 1 : 0;
    let url = $(this).attr('data-url');

    $.ajax({
        method: "POST",
        url: url,
        data: {
            id: id,
            field: "status",
            value: value,
        },
        success: function (data) {
            if (!data.status) {
                $(`[data-action=changeStatus][data-id=${id}]`).prop("checked", isChecked)
            }
        },
        error: function () {

        },
    })
})


function slugify(string) {
    var slug;

    slug = string.toLowerCase();

    slug = slug.replace(/Ă¡|Ă |áº£|áº¡|Ă£|Äƒ|áº¯|áº±|áº³|áºµ|áº·|Ă¢|áº¥|áº§|áº©|áº«|áº­/gi, 'a');
    slug = slug.replace(/Ă©|Ă¨|áº»|áº½|áº¹|Ăª|áº¿|á»|á»ƒ|á»…|á»‡/gi, 'e');
    slug = slug.replace(/i|Ă­|Ă¬|á»‰|Ä©|á»‹/gi, 'i');
    slug = slug.replace(/Ă³|Ă²|á»|Ăµ|á»|Ă´|á»‘|á»“|á»•|á»—|á»™|Æ¡|á»›|á»|á»Ÿ|á»¡|á»£/gi, 'o');
    slug = slug.replace(/Ăº|Ă¹|á»§|Å©|á»¥|Æ°|á»©|á»«|á»­|á»¯|á»±/gi, 'u');
    slug = slug.replace(/Ă½|á»³|á»·|á»¹|á»µ/gi, 'y');
    slug = slug.replace(/Ä‘/gi, 'd');
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    slug = slug.replace(/ /gi, "-");
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');

    return slug;
}

function plusField(wrap){
    let template = $(`${wrap} [data-content=templateItem]`).html();

    $('body').on('click',wrap + ' [data-action=addField]', function(){
        $(wrap).append(template);

        $(this).attr('data-action','minusField');
    });

    $('body').on('click',wrap + ' [data-action=minusField]', function(){ 
        $(this).parent().parent().parent().remove();
    });
}
