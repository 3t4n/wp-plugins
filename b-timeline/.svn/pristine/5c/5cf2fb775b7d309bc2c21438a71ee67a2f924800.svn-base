jQuery(document).ready(function ($) {
  let tlDataId = $(".bp_titleline");

  console.log(tlDataId);
  tlDataId.map(function (index, item) {
    console.log(item);
  });

  // console.log(timelineData);
  tlDataId.map((index, timeline_item) => {
    const timelineData = $(timeline_item).data("timeline");
    timeline_item.removeAttribute("data-timeline");

    if (!timelineData) return false;

    const { timeline_type, date_location, item_datas, start_item, move_item, visible_items, vertica_trigger, rtl_mode, content_position = "" } = timelineData;

    $(timelineData).removeAttr("data-timeline");
    // console.log({ timeline_type })
    $(timeline_item).addClass(`content_${timeline_type}_${content_position}`);

    $(timeline_item).timeline({
      mode: timeline_type || "vertical",
      horizontalStartPosition: date_location,
      forceVerticalMode: 600,
      verticalStartPosition: date_location,
      verticalTrigger: `${vertica_trigger}%`,
      moveItems: parseInt(move_item),
      startIndex: parseInt(start_item),
      visibleItems: parseInt(visible_items),
      rtlMode: rtl_mode === "1",
    });

    const timelineFunc = (el, mode, position) => {
      // console.log(el, mode, position)
      // Array.from(el).forEach((e) => {
      const items = el.querySelector(".timeline__items").querySelectorAll(".timeline__item");

      Array.from(items).forEach((item) => {
        const contentWrap = item?.querySelector(".timeline__content__wrap .timeline__content__wrap");
        if (mode === "horizontal") {
          contentWrap.style.setProperty("width", getComputedStyle(items[0]).width);
          // el.querySelector(".timeline__items").style.setProperty("display", "flex");
          $(el.querySelector(".timeline__items")).css({ display: "flex", gap: "15px" });
          if (item.className.includes("timeline__item--bottom") && position === "start") {
            const styles = getComputedStyle(items[0]);
            item.style.setProperty("transform", "");
            item.style.setProperty("height", styles.height);
            console.log(contentWrap);
            item.classList.remove("timeline__item--bottom");
            item.classList.add("timeline__item--top");
          } else if (item.className.includes("timeline__item--top") && position === "end") {
            const styles = getComputedStyle(items[1]);
            item.classList.remove("timeline__item--top");
            item.classList.add("timeline__item--bottom");
            item.style.setProperty("transform", styles.transform);
          }
        }
        if (mode === "vertical") {
          if (item.className.includes("timeline__item--right") && position === "start") {
            // item.style.setProperty("transform", "");
            item.classList.remove("timeline__item--right");
            item.classList.add("timeline__item--left");
          } else if (item.className.includes("timeline__item--left") && position === "end") {
            item.classList.remove("timeline__item--left");
            item.classList.add("timeline__item--right");
          }
        }
      });
    };
    // };
    timelineFunc(timeline_item, timeline_type, content_position);
  });
});
