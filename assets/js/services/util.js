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
        laundry:        "19768",
        handy_man:      "19809",
        moving:         "19810",
        cooking:        "19811",
        events:         "19830",
        cleaning:       "19831",
        beauty:         "19832",
        deliveries:     "19833",
        driver:         "19834",
        diesel:         "19835",
        custom_tasks:   "19836"
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
