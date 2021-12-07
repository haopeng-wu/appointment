(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports) :
        typeof define === 'function' && define.amd ? define(['exports'], factory) :
            (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.ru = {}));
}(this, (function (exports) { 'use strict';

    var fp = typeof window !== "undefined" && window.flatpickr !== undefined
        ? window.flatpickr
        : {
            l10ns: {},
        };
    var Russian = {
        weekdays: {
            shorthand: ["Sön", "Mån", "Tis", "Ons", "Tors", "Fre", "Lör"],
            longhand: [
                "Söndag",
                "Måndag",
                "Tisdag",
                "Onsdag",
                "Torsdag",
                "Fredag",
                "Lördag",
            ],
        },
        months: {
            shorthand: [
                "Jan.",
                "Febr.",
                "Mars",
                "April",
                "Maj",
                "Juni",
                "Juli",
                "Aug.",
                "Sept.",
                "Okt.",
                "Nov.",
                "Dec.",
            ],
            longhand: [
                "Januari",
                "Februari",
                "Mars",
                "April",
                "Maj",
                "Juni",
                "Juli",
                "Augusti",
                "September",
                "Oktober",
                "November",
                "December",
            ],
        },
        firstDayOfWeek: 1,
        ordinal: function () {
            return "";
        },
        rangeSeparator: " — ",
        weekAbbreviation: "weekAbbreviation",
        scrollTitle: "scrollTitle",
        toggleTitle: "toggleTitle",
        amPM: ["am", "pm"],
        yearAriaLabel: "yearAriaLabel",
        time_24hr: true,
    };
    fp.l10ns.ru = Russian;
    var ru = fp.l10ns;

    exports.Russian = Russian;
    exports.default = ru;

    Object.defineProperty(exports, '__esModule', { value: true });

})));