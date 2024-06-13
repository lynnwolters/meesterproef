
// ScrollTrigger.defaults({
//     scroller: ".list"
// });

// let proxy = { skew: 0 },
//     skewSetter = gsap.quickSetter(".item", "skewY", "deg"), // fast
//     clamp = gsap.utils.clamp(-15, 15); // don't let the skew go beyond 20 degrees.

// ScrollTrigger.create({
//   onUpdate: (self) => {
//     let skew = clamp(self.getVelocity() / -300);
//     // only do something if the skew is MORE severe. Remember, we're always tweening back to 0, so if the user slows their scrolling quickly, it's more natural to just let the tween handle that smoothly rather than jumping to the smaller skew.
//     if (Math.abs(skew) > Math.abs(proxy.skew)) {
//       proxy.skew = skew;
//       gsap.to(proxy, {skew: 0, duration: 0.2, ease: "power4.out", overwrite: true, onUpdate: () => skewSetter(proxy.skew)});
//     }
//   }
// });

// // make the right edge "stick" to the scroll bar. force3D: true improves performance
// gsap.set(".item", { force3D: true});