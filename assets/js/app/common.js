/* jshint undef: true, unused: false, strict: true */
/* global jQuery, BASE_URL, locache */
var Config = {
    baseURL: BASE_URL
};

var CS = (function($, Config) {
'use strict';

    var post = function (url, params) {
        
        console.log("post");
        console.log(Config.baseURL+url);
        console.log(params);


        return $.ajax({
            // async: async,
            url: Config.baseURL+url,
            type: 'post',
            dataType: 'json',
            data: params,
        });
    }; 
        

    var get = function (url, params) {

        console.log("get");
        console.log(Config.baseURL+url);
        console.log(params);

        return $.ajax({
            url: Config.baseURL+url,
            type: 'get',
            dataType: 'json',
            data: params,
        });
        // .done(deferdone)
        // .fail(deferfail)
        // .always(deferfail);
    };

    var doneRedirect = function (data, textStatus, jqXHR) {

    };

    var ajaxdone = function (data, textStatus, jqXHR) {

    };

    var ajaxfail = function (jqXHR, textStatus, errorThrown) {

    };

    var ajaxalways = function (a, textStatus, b) {

    };

    var checkSuccessData = function (data) {
        if (typeof data === 'object') {
            return true;
        }

        return false;
    };

    var getSearchParameters = function (url) {
        var prmstr = url || window.location.search.substr(1);
        return prmstr !== null && prmstr !== '' ? transformToAssocArray(prmstr) : {};
    };

    var transformToAssocArray = function ( prmstr ) {
        var params = {};
        var prmarr = prmstr.split('&');
        for ( var i = 0; i < prmarr.length; i++) {
            var tmparr = prmarr[i].split('=');
            params[tmparr[0]] = tmparr[1];
        }
        return params;
    };

    var dayOfWeekAsInteger = function(day) {
        return ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'].indexOf(day);
    };

    var initDatepicker = function() {
        $('.datepicker').datepicker({
          defaultDate: new Date(),
          dateFormat: 'D, d M yy'
        });
        $('.trigger-datepicker').click(function() {
            $(this).prev('.datepicker').datepicker('show');
        });
    };

    var post_to_url = function (path, params, method) {
        method = method || 'post'; // Set method to post by default if not specified.

        // The rest of this code assumes you are not using a library.
        // It can be made less wordy if you use one.
        var form = document.createElement('form');
        form.setAttribute('method', method);
        form.setAttribute('action', path);

        for(var key in params) {
            if(params.hasOwnProperty(key)) {
                var hiddenField = document.createElement('input');
                hiddenField.setAttribute('type', 'hidden');
                hiddenField.setAttribute('name', key);
                hiddenField.setAttribute('value', params[key]);

                form.appendChild(hiddenField);
             }
        }

        document.body.appendChild(form);
        form.submit();
    };

    var notify = function (html) {
        $('.top-right').notify({
            message: { html: html },fadeOut: {enabled:false}
          }).show();
    };

    var preSelect = function () {
        var url = $.url().param();
        var select;

        $.each(url, function(index, val) {
             /* iterate through array or object */
            select = document.getElementById(index);
            if (select) {
                $(select).val(val);
            }
        });
    };

    // using locachejs to store value
    var setCache = function(key, value, time) {
      key = key || 'key';
      value = value || {};
      time = time || null;
      // just incase we dont have locache
        if (typeof locache !== 'undefined') {
          if (time) {
            return locache.session.set(key, value, time);
          } else {
            return locache.session.set(key, value);
          }
        }
    };

    var getCache = function(key) {
        if (typeof locache !== 'undefined') {
          return locache.session.get(key);
        }
    };

    var removeCache = function(key) {
        if (typeof locache !== 'undefined') {
          return locache.session.remove(key);
        }
    };

    var checkResponse = function(data) {
      if (typeof data === 'undefined') {
          if (!window.alert('Unable to parse server response. Please try again later. Error code 500.')) {
            return true;
          }
      }
      return false;
    };

    var checkHeaderCode = function (data) {
      if (!data || data.status == 500) {
        if (!window.alert('Unable to parse response from server. Please try again later.')) {
          return true;
        }
      }

      if (data.status == 403) {
        if (data.responseJSON) {
          window.location.href = data.responseJSON.redirect || window.location.href;
        } else {
          window.location.href = window.location.href;
        }
        return true;
      }

      return false;
    };

    return {
        get: get,
        post: post,
        doneRedirect: doneRedirect,
        getSearchParameters: getSearchParameters,
        dayOfWeekAsInteger: dayOfWeekAsInteger,
        initDatepicker: initDatepicker,
        postForm: post_to_url,
        notify: notify,
        setCache: setCache,
        getCache: getCache,
        removeCache: removeCache,
        preSelect: preSelect,
        checkResponse: checkResponse,
        checkHeaderCode: checkHeaderCode
    };
})(jQuery, Config);
