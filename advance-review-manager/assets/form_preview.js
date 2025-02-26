jQuery(document).ready(function(e){let t={action:"ad_review_manager_ajax",nonce:window.ADRMPublic.adrm_nonce,route:"get_reviews"};const d=e(".review-template_settings_wrapper").attr("data-template-type");let v=window.ADRMPublic.user_id;window.ADRMPublic.ajax_url;let p=window.ADRMPublic.adrm_nonce;e(".adrm-filter-by-star").change(function(o){let a=+e(this).closest(".review-template_settings_wrapper").attr("data-form-id");t.formID=a,t.filter=e(this).val(),y()}),e(".adrm-sort-input").change(function(o){let a=+e(this).closest(".review-template_settings_wrapper").attr("data-form-id");t.formID=a,t.sort=e(this).val(),y()}),e(".adrm-page-number").click(function(o){e(this).addClass("active").siblings().removeClass("active");let a=+e(this).closest(".review-template_settings_wrapper").attr("data-form-id"),i=e(this).text();t.formID=a,t.page=i,y()}),e(".adrm-next-page, .adrm-prev-page").click(function(o){let a=+e(this).closest(".review-template_settings_wrapper").attr("data-form-id"),i=+e(".adrm-page-number.active").text();t.formID=a;let r=e(this).hasClass("adrm-next-page")?i+1:i-1;t.page=r,e(".adrm-page-number.active").removeClass("active"),e(".adrm-page-number").eq(r-1).addClass("active"),y()}),e(".adrm-success-notification").click(function(o){o.preventDefault();let s=e(this).closest("form"),a=+s.attr("data-adrm-form-id");if(D(s)){let l={ratings:[]},f=s.serializeArray(),c=0;s.find("[data-id]").each(function(){f[c].label=e(this).attr("data-id"),c++}),f.map(u=>{u.name.includes("rating")?l.ratings.push({name:u.name,value:u.value,label:u.label}):l[u.name]=u.value});let n={formID:a,formComponent:f,formFieldData:l,action:"ad_review_manager_ajax",nonce:window.ADRMPublic.adrm_nonce,route:"create_review"};x(n,a)}else{var r=e('<div class="adrm-error-notification">Please fill required field !</div>');e(s).append(r),setTimeout(function(){r.remove()},3e3)}});function D(o,s){let a=!0;return o.serializeArray().map(r=>{r.name.includes("rating")?r.value?e(`[name="${r.name}"]`).removeClass("error"):(a=!1,e(`[name="${r.name}"]`).addClass("error")):r.value?e(`[name="${r.name}"]`).removeClass("error"):(a=!1,e(`[name="${r.name}"]`).addClass("error"))}),a}function x(o,s){const a=e(`[data-adrm-form-id="${s}"]`);e.ajax({url:window.ADRMPublic.ajax_url,type:"POST",data:o,success:function(i){e(a).find("input:not([type=submit])").val("");var r=e('<div class="adrm-success-notification">Review submitted successfully</div>');e(a).append(r),setTimeout(function(){r.remove()},3e3),location.reload()}})}function y(){e.ajax({url:window.ADRMPublic.ajax_url,type:"GET",data:t,success:function(o){if(o.success){const s=e(".adrm_food_review_template_wrapper, .adrm_product_review_temp");C(o.data,s)}}})}function C(o,s){s.empty();let a="",i="",r=0,l=(o==null?void 0:o.reviews)||[],f=[],c="";l!=null&&l.length?l.map((n,u)=>{var _;a=n==null?void 0:n.created_at,i=n==null?void 0:n.avatar,r=n==null?void 0:n.average_rating,f=n!=null&&n.comments?n==null?void 0:n.comments:[],c=n==null?void 0:n.id,n=(_=n==null?void 0:n.meta)==null?void 0:_.formFieldData,(d==null?void 0:d.includes("hotel-review-form-template"))||(d==null?void 0:d.includes("food-review-form-template"))?j(s,i,n,c,f,a,r):d!=null&&d.includes("product-review-form-template")&&R(s,i,n,a,r)}):s.append('<div class="adrm_food_review_template"><p class="adrm-empty-review">No reviews found yet !</p></div>')}function j(o,s,a,i,r,l,f){var _;const c=`
        <div class="adrm_food_review_template">
            <div class="adrm_review_content">
                <div class="adrm-reviewer-info">
                    <div class="adrm-reviewer-avatar">
                        ${s}
                    </div>
                    <div class="adrm-reviewer-name">
                        <span>${(a==null?void 0:a.name)||""}</span>
                    </div>
                    <div class="adrm-reviewer-email">
                        <span>${(a==null?void 0:a.email)||""}</span>
                    </div>
                </div>
                <div class="adrm-review-body">
                    <div class="adrm-review-rating">
                        <div class="adrm-star-rating">
                        ${Array.from({length:5},(m,g)=>`<label name="rating" class="${g<f?"active":""}" value="${g+1}">\u2605</label>`).join("")}
                        </div>
                        <span class="adrm-review-date"> Reviewed ${h(l)}</span>
                    </div>
                    <div class="adrm-review-content">
                        <p>${a==null?void 0:a.message}</p>
                    </div>
                    <div class="review-categories">
                            ${(_=a==null?void 0:a.ratings)==null?void 0:_.map(m=>`<div class="adrm-star-rating">
                                    ${Array.from({length:5},(g,b)=>`<label name="rating" class="${b<(m==null?void 0:m.value)?"active":""}" value="${b+1}">\u2605</label>`).join("")}

                                    <p>${m==null?void 0:m.label}</p>
                                </div>`).join("")}

                            ${v?`
                                <button class="adrm-reply-btn" style="margin-top: 10px  ">Reply</button>
                            `:""}
                    </div>
                </div>
            </div>
            <!-- Reply Form Section -->
                <div class="adrm-reply">
                    <form class="adrm-reply-form">
                        <input type="hidden" name="action" value="adrm_review_reply_action">
                        <input type="hidden" name="review_id" value="${i}"/>
                        <input type="hidden" name="adrm_reply_nonce_field" value="${p}">
                        <textarea name="reply" id="reply" cols="10" rows="6"></textarea>
                        <button class="adrm-reply-button">Submit</button>
                    </form>
                </div>
            
                <!-- Replies Section -->
                ${r!=null&&r.length?`
                <div class="adrm-review-reply-section"> 
                    <h4 style="font-size: 16px; color: #333">Replies</h4>
                    ${r.map(m=>`
                        <div class="adrm-review-comment" style="padding: 10px">
                            <div> 
                                <span style="font-size: 14px; color: #333">${A(m.name||"")}</span>
                            </div>
                            <div class="adrm-review-comment-content" style="color: #333; font-size: 14px">
                                <p>${m.comment||""}</p>
                            </div>
                        </div>
                    `).join("")}
                </div>
                `:""}
            </div>
        </div>
        `;o.append(c);const n=document.querySelector(".adrm-reply-btn");n&&n.addEventListener("click",function(){console.log("Reply button clicked!"),e(this).closest(".adrm_food_review_template").find(".adrm-reply").toggle()});const u=document.querySelector(".adrm-reply-form");u&&u.addEventListener("submit",function(m){m.preventDefault(),e(this).find("button").attr("disabled",!0);var g=e(this).serialize();e.ajax({url:window.ADRMPublic.ajax_url,type:"POST",data:g,success:function(b){location.reload()}})})}function R(o,s,a,i,r){let l=`
            <div class="adrm_review_temp_one adrm_product_review_temp">
                <div class="adrm_review_temp_one_avatar">
                    ${s}
                </div>
                <div class="adrm_review_temp_one_content">
                    <div class="adrm_review_temp_one_content_header">
                        <div class="left">
                            <p class="date adrm-heading">${(a==null?void 0:a.name)||""}</p>
                            <h3 class="adrm_review_temp_one_content_header_name adrm-heading">
                                ${(a==null?void 0:a.title)||""}
                            </h3>
                        </div>
                        <div class="adrm-review-rating">
                            <p> ${h(i)}</p>
                            <div class="adrm-star-rating">
                            ${Array.from({length:5},(f,c)=>`<label name="rating" class="${c<r?"active":""}" value="${c+1}">\u2605</label>`).join("")}
                            </div>
                        </div>
                    </div>
                    <div class="adrm_review_temp_one_content_body">
                        <p class="review">${a==null?void 0:a.message}</p>
                    </div>
                </div>
            </div>`;o.append(l)}function A(o){return o?o.charAt(0).toUpperCase()+o.slice(1):""}function h(o){const s=new Date(o),a=s.getFullYear(),i=String(s.getMonth()+1).padStart(2,"0"),r=String(s.getDate()).padStart(2,"0");return`${a}-${i}-${r}`}});jQuery(document).ready(function(e){e(".btn").click(function(){var t=e(".adrm-testimonial-container.active"),d=t.next(".adrm-testimonial-container"),v=t.prev(".adrm-testimonial-container"),p=e(".progress-dot.active");e(this).attr("id")=="btn-next"?d.length?(t.removeClass("active"),p.removeClass("active"),p.next().addClass("active"),d.addClass("active")):(t.removeClass("active"),p.removeClass("active"),e(".progress-dot").first().addClass("active"),t.siblings().first().addClass("active")):v.length?(t.removeClass("active"),p.removeClass("active"),p.prev().addClass("active"),v.addClass("active")):(t.removeClass("active"),p.removeClass("active"),e(".progress-dot").last().addClass("active"),t.siblings().last().addClass("active"))}),jQuery(document).ready(function(t){t(".adrm-reply-btn").on("click",function(){t(this).closest(".adrm_food_review_template").find(".adrm-reply").toggle()})}),jQuery(document).ready(function(t){t(".adrm-reply-btn").on("click",function(){t(this).closest(".adrm_review_product_temp").find(".adrm-reply").toggle()})}),jQuery(document).ready(function(t){t(".adrm-reply-btn").on("click",function(){t(this).closest(".adrm_hotel_review_template").find(".adrm-reply").toggle()})}),jQuery(document).ready(function(t){t(".adrm-reply-btn").on("click",function(){t(this).closest(".adrm_review_temp_book").find(".adrm-reply").toggle()})}),jQuery(document).ready(function(t){t(".adrm-reply-form").on("submit",function(d){d.preventDefault(),t(this).find("button").attr("disabled",!0);var v=t(this).serialize();t.ajax({url:window.ADRMPublic.ajax_url,type:"POST",data:v,success:function(p){location.reload()}})})})});
