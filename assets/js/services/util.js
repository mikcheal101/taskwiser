"use strict";

app.service("Util", [function() {
    var util    = this;

    util.sort_date          = function(day, month, year, hour, min, sec = "0", period ="am") {
        var h   = parseInt(hour);
        var mi  = parseInt(min);
        var s   = parseInt(sec);

        var mo  = parseInt(month);
        var d   = parseInt(day);
        var yr  = parseInt(year);

        var _set= new Date();
        _set.setSeconds(s);
        _set.setMinites(mi);
        _set.setHours(h);

        _set.setMonth(mo);
        _set.setDate(d);
        _set.setFullYear(yr);

        h       = (period.toLowerCase() === "pm") ? h + 12 : h;
        return _set;

    };

    util.tookanapp_teams    = {
        laundry:        "20071",
        handy_man:      "20072",
        moving:         "20073",
        cooking:        "20074",
        events:         "20075",
        cleaning:       "20076",
        beauty:         "20077",
        deliveries:     "20078",
        driver:         "20079",
        diesel:         "20080",
        custom_tasks:   "20081"
    };

    util.is_equal           = function(string_a, string_b) {
        string_a = string_a.toLowerCase();
        string_b = string_b.toLowerCase();

        return string_b === string_a;
    };

    util.is_null            = function(obj) {
        return obj === NULL;
    };

    return util;
}]);
