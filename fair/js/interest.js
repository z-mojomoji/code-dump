var lib = {
    numberWithCommas: function(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
};
var ajaxCtrl = {
    send: function(option, callback) {
        $.ajax($.extend({
            url: 'ajax.php',
            type: 'GET',
            dataType: 'json',
            success: function(resp) {
                if (!resp.status) {
                    alert(resp.error.msg);
                    return false;
                }

                if (typeof callback === 'function')
                    callback(resp);
            }
        }, option));
    }
};
var popupInterest = {
    clearSize: function() {
        var _self = this;

        _self.objWrap.css({
            'max-height': 'none',
            'overflow': 'visible'
        });
    },
    setSize: function() {
        var _self = this;

        if (_self.objPop.hasClass('active')) {
            _self.objWrap.css({
                'max-height': _self.objPop.find('#popup-box').outerHeight() + 100 + 'px',
                'overflow': 'hidden'
            });
        }
    },
    show: function() {
        var _self = this;

        _self.objPop.addClass('active');
        _self.setSize();
        $('body,html').scrollTop(0);

        _self.objPopBox.addClass('animated bounceInDown');
        setTimeout(function() {
            _self.objPopBox.removeClass('bounceInDown');
        }, 1000);
    },
    hide: function() {
        var _self = this;

        _self.objPopBox.addClass('bounceOutDown');

        setTimeout(function() {
            _self.objPopBox.removeClass('bounceOutDown');
            _self.objPop.removeClass('active');
            _self.clearSize();
            _self.clearVal();
        }, 1000);

    },
    clearVal: function() {
        var _self = this;

        _self.clearErr();
        _self.objForm.find('input[type="text"],select').val('');
        //_self.objForm.find('input[type="checkbox"]').attr('checked', false);
    },
    clearErr: function() {
        var _self = this;

        _self.objForm.find('input,select').removeClass('error');
    },
    init: function() {
        var _self = this;

        _self.objPop = $('#popup-interest');
        _self.objPopBox = _self.objPop.find('#popup-box');
        _self.objWrap = $('#fair-wrap');
        _self.objForm = $('#form-interest');

        $(document)
                .on('click', '#popup-interest', function() {
                    _self.hide();
                })
                .on('click', '#popup-interest #popup-box', function(e) {
                    e.stopPropagation();
                })
                .on('click', '.btn-pop-interest', function(e) {
                    e.preventDefault();
                    var el = $(this);
                    _self.show();
                })
                .on('click', '#popup-interest .btn-pop-close', function(e) {
                    e.preventDefault();
                    var el = $(this);
                    _self.hide();
                })
                .on('change', '.error', function() {
                    var el = $(this);
                    el.removeClass('error');
                })
                .on('change', '[name="job"]', function() {
                    var el = $(this);
                    var elEdu = $('[name="edu_level"]');
                    var elJobOth = $('[name="job_other"]');
                    var jobVal = el.val();
                    elEdu.addClass('disabled');
                    elJobOth.addClass('disabled');
                    switch (jobVal) {
                        case '1':
                            elEdu.removeClass('disabled');
                            break;
                        case '-1':
                            elJobOth.removeClass('disabled');
                            elJobOth.focus();
                            break;
                    }
                })
                .on('click', '[name="edu_level"]', function() {
                    $('[name="job"][value="1"]').click();
                })
                .on('click', '[name="job_other"]', function() {
                    $('[name="job"][value="-1"]').click();
                })
                .on('submit', '#form-interest', function(e) {
                    e.preventDefault();

                    var form = $(this);
                    var countEl = $('#txt-interest-count');
                    var countVal = parseInt(countEl.text());

                    $('body,html').scrollTop(0);

                    if (_self.objPop.hasClass('loading')) {
                        return false;
                    }

                    _self.clearErr();

                    ajaxCtrl.send({
                        type: 'POST',
                        data: form.serialize() + '&action=send_interest',
                        beforeSend: function() {
                            _self.objPop.addClass('loading');
                        },
                        complete: function() {
                            _self.objPop.removeClass('loading');
                        },
                        success: function(resp) {

                            if (!resp.status) {
                                var errList = resp.error.err_list;
                                if (typeof errList === 'object') {
                                    var errStr = '';
                                    for (var i in errList) {
                                        errStr += "- " + errList[i].msg + "\n";
                                        form.find('[name="' + errList[i].ref + '"]').addClass('error');
                                    }
                                    alert(errStr);
                                } else {
                                    alert(resp.error.msg);
                                }
                                return false;
                            }


                            alert('บันทึกข้อมูลเรียบร้อยแล้ว');
                            countEl.text(lib.numberWithCommas(countVal + 1));
                            _self.clearVal();
                            _self.hide();
                        }
                    });
                });
    }
};