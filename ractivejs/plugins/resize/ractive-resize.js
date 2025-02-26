(function (root, factory) {
    if (typeof define === "function" && define.amd) {
        define(["ractive"], factory);
    } else if (typeof exports === "object") {
        module.exports = factory(require("ractive"));
    } else {
        root.Ractive = factory(root.Ractive);
    }
}(this, function (Ractive) {
    "use strict";

    var getMousePosition = function (property, alternative, additionalOffset) {
            return function (event) {
                if (event[property] !== undefined) {
                    return event[property];
                } else if (event[alternative] !== undefined) {
                    return  event[alternative] + document.body[additionalOffset] + document.documentElement[additionalOffset];
                }

                throw new Error("Pointer position not found");
            };
        },

        getPageX = getMousePosition("pageX", "clientX", "scrollLeft"),
        getPageY = getMousePosition("pageY", "clientY", "scrollTop"),

        getElementRect = function (element) {
            if (!element) {
                return;
            }

            var rect = element.getBoundingClientRect(),
                top = rect.top + window.pageYOffset,
                left = rect.left + window.pageXOffset;

             return {
                top: top,
                left: left,
                right: left + rect.width,
                bottom: top + rect.height,
                width: rect.width,
                height: rect.height
             };
        },

        getParentOffset = function (node) {
            return node.offsetParent === document.body ? { left: 0, top: 0 } : getElementRect(node.offsetParent);
        },

        nodes = [],

        each = function (func, array) {
            for (var i = 0, j = array.length; i < j; i++) {
                func(array[i]);
            }
        },

        emptyResizer = function () {
            return {
                left: false,
                right: false,
                top: false,
                bottom: false
            };
        },

        getResizer = function (event, node) {
            var x = getPageX(event),
                y = getPageY(event),
                precision = 5,
                rect = getElementRect(node),
                limits = y > rect.top - precision && y < rect.bottom + precision && x > rect.left - precision && x < rect.right + precision,
                resizer = emptyResizer();

            if (limits) {
                if (y < rect.top + precision && y > rect.top - precision) {
                    resizer.top = true;
                }

                if (y < rect.bottom + precision && y > rect.bottom - precision) {
                    resizer.bottom = true;
                }

                if (x < rect.left + precision && x > rect.left - precision) {
                    resizer.left = true;
                }

                if (x < rect.right + precision && x > rect.right - precision) {
                    resizer.right = true;
                }
            }

            return resizer;
        },

        resizing = function (resizer) {
            return resizer.left || resizer.right || resizer.top || resizer.bottom;
        },

        down;

    document.addEventListener("mouseup", function (event) {
        var pd = false;

        each(function (item) {
            var rect;

            if (item.resizing) {
                rect = getElementRect(item.node);
                pd = true;
                item.node._resizing = false;
                item.resizing = false;
                item.fire({node: item.node, height: rect.height, width: rect.width });
            }
        }, nodes);

        if (pd) {
            event.preventDefault();
        }
    });

    document.addEventListener("mousemove", function (event) {
        if (nodes.length) {
            event.preventDefault();

            var x = getPageX(event),
                y = getPageY(event),
                cursor = "";

            each(function (item) {
                var parentOffset = getParentOffset(item.node),
                    dx, dy;

                if (item.resizing) {
                    dx = down.x - x;
                    dy = down.y - y;

                    if (item.resize.top) {
                        if (item.rect.height + dy > 1) {
                            item.node.style.height = item.rect.height + dy + "px";
                            item.node.style.top = item.rect.top - dy - parentOffset.top + "px";
                        }
                    }

                    if (item.resize.bottom) {
                        if (item.rect.height - dy > 1) {
                            item.node.style.height = item.rect.height - dy + "px";
                        }
                    }

                    if (item.resize.left) {
                        if (item.rect.width + dx > 1) {
                            item.node.style.width = item.rect.width + dx + "px";
                            item.node.style.left = item.rect.left - dx - parentOffset.left + "px";
                        }
                    }

                    if (item.resize.right) {
                        if (item.rect.width - dx > 1) {
                            item.node.style.width = item.rect.width - dx + "px";
                        }
                    }
                } else {
                    var resize = getResizer(event, item.node);

                    if ((resize.top && resize.left) || (resize.bottom && resize.right)) {
                        cursor = "nwse-resize";
                    } else if ((resize.top && resize.right) || (resize.bottom && resize.left)) {
                        cursor = "nesw-resize";
                    } else if (resize.top || resize.bottom) {
                        cursor = "ns-resize";
                    } else if (resize.left || resize.right) {
                        cursor = "ew-resize";
                    }
                }
            }, nodes);

            document.body.style.cursor = cursor;
        }
    });

    document.addEventListener("mousedown", function (event) {
        var pd = false;

        each(function (item) {
            item.resize = getResizer(event, item.node);

            if (resizing(item.resize)) {
                item.rect = getElementRect(item.node);
                item.resizing = true;
                item.node._resizing = true;
                pd = true;
            }
        }, nodes);

        down = {
            x: getPageX(event),
            y: getPageY(event)
        };

        if (pd) {
            event.preventDefault();
        }
    });

    Ractive.events.resize = function (node, fire) {
        var classes = node.getAttribute("class") || "";

        classes += " resizeable";
        node.setAttribute("class", classes);

        node.style.position = "absolute";

        var item = {resizing: false, node: node, fire: fire};

        nodes.push(item);
    };

    return Ractive;
}));
