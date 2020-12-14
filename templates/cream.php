<script>
var nextBg = '.bg3',
    mainTL = gsap.timeline()
    .fromTo('.cone',    {scale:0, transformOrigin:'75% 65%'},{duration:1, scale:1, ease:'elastic.out(2)'}, 0)
    .to('.cone',        {duration:0.3, rotation:20, yoyo:true, repeat:1, ease:'power3.in'}, 0.5)
    .from('.cone',      {duration:0.7, x:200, ease:'back.inOut(2)'}, 0.5)
    .from('.txt',       {duration:0.5, opacity:0, stagger:0.25, ease:'power1.inOut'}, 0.8)
    .from('.txt',       {duration:0.5, y:'+=50', stagger:0.2, ease:'expo'}, 0.8)

    .from('.btn',       {duration:1.1, y:-425, stagger:-0.15, ease:'power3.inOut', onComplete:activateMenu}, 0.7)
    .from('.btn',       {duration:0.9, scaleY:3, stagger:-0.15, transformOrigin:'0 100%', ease:'sine.inOut'}, 1)
    .from('.m',         {duration:0.8, attr:{y1:70}, stagger:-0.12, ease:'back.out(3)'}, 1.8)
    
    .from('.bg2',       {duration:0.8, scale:1.2, ease:'back.out(2)'}, 0.4)
    .from('.bg3',       {duration:0.6, scale:1.2, transformOrigin:'110% 110%', ease:'back.out(1.2)'}, 0.5)
    .from('.bg3_wave',  {duration:8, x:-585, y:600, ease:'none', repeat:-1}, 0.3)
    .to('.bg2_wave',    {duration:6, x:-447, y:704, ease:'none', repeat:-1}, 0.3)
    .call(startDrip, ['.bg3_drip', 250, -160, 110], 1.5)
    .call(startDrip, ['.bg2_drip', 830, 300, 50], 1.9)


function startDrip( drip, xBase, yStart, hStart ){
  gsap.fromTo(drip, {
    x:()=>gsap.utils.random(xBase,xBase+80),
    y:yStart,
    attr:{
      y1:0,
      y2:hStart,
      'stroke-width':()=>gsap.utils.random(35,70)
    }
  }, {
    duration:1.1,
    y:'+=325',
    attr:{
      y1:hStart,
      'stroke-width':'-=10'
    },
    ease:'power2.in',
    repeat:-1,
    repeatRefresh:true
  });
}


function activateMenu(){ console.log('activate')
  $('.btn').on('mouseover', (e)=> gsap.to('.m'+e.currentTarget.id, {duration:0.25, attr:{y1:47}, ease:'back.out(3)'}) );

  $('.btn').on('mouseout', (e)=> gsap.to('.m'+e.currentTarget.id, {duration:0.4, attr:{y1:56}, ease:'back.inOut(4)'}) );

  $('.btn').on('click', (e)=>{
    var color = gsap.getProperty(e.currentTarget, 'fill');
    gsap.to(nextBg, {duration:0.1, attr:{fill:color, stroke:color}});
    (nextBg=='.bg1') ? nextBg='.bg3' : nextBg='.bg1';
  });
}


var coneTL = gsap.timeline({paused:true})
   .to('.qDrip', {duration:(i)=>[2.4,2][i], attr:{y2:'+=16'}, repeat:-1, yoyo:true, ease:'back.inOut(5)'});

$('.titleHit').on('mouseover', ()=>coneTL.play() );
$('.titleHit').on('mouseout', ()=>coneTL.pause() );


var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
if (isSafari) gsap.set('.bg2, .bg3', {attr:{filter:'none'}}); 
</script>
<div class="stage">
<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1000 750" preserveAspectRatio="xMidYMid slice">  
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
      <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
    </filter>
  </defs>
  
  <rect class="bg1" width="100%" height="100%" fill="#7df0b9" stroke="7df0b9" />
  
  <g class="bg2" stroke="#fff" stroke="#fff" filter='url(#goo)'>
    <path class="bg2_wave" fill="#fff" d="M1458-489c-65.5,44.5-61.5,85.5-71.5,192.5s-19.72,146.7-78,186c-86,58-134,45-175,157.5 s-82.25,142.75-123.25,166.75l0,0c-65.5,44.5-61.75,85.75-71.75,192.75s-19.72,146.7-78,186c-86,58-134,45-175,157.5 s-82,142-123,166H-10V-710h1468V-489z"/>
    <line class="bg2_drip" x1="0" y1="0" x2="0" y2="150" stroke-width="30" stroke-linecap="round"/>
  </g>
    
  <g class="bg3" fill="#7268e5" stroke="#7268e5" filter='url(#goo)'>
    <path class="bg3_wave" d="M1032.39-602c-20.68,25.45-52.12,40.71-92.42,49.25c-101.5,21.5-259,58-269,216s-106,226-106,226 C524.5-80.5,507.5-74.5,447.42-2.48C426.41,22.7,395.3,38.46,355,47C253.5,68.5,96,105,86,263S-20,489-20,489V-602H1032.39z" />
    <line class="bg3_drip" x1="0" y1="0" x2="0" y2="150" stroke-width="30" stroke-linecap="round"/>
  </g>
        
  <g class="cone">
    <path class="coneBase" fill="#FFDE7D" d="M213.5,309.5c4,6,39,55,42,60s6,6,9.5,0s37.5-50,40.5-54s1-7-3.5-7s-80.5-6-84.5-6S211.5,306.5,213.5,309.5z"/>
    <g fill="#FF3680" stroke="#FF3680" stroke-linecap="round">
      <line class="qDrip" x1="312" y1="400" x2="312" y2="414" stroke-width="18" />
      <line class="qDrip" x1="320" y1="400" x2="320" y2="407" stroke-width="15" />
      <path d="M351.5,357.5c-1.98-12.85-12-23-14-24c-4-2,0-9-7-15c-3.22-2.76-7-6-9-4s-54,67-54,67c1,23,21,24,25,24 c1.33,0,8.82,0.47,10.5,5.5c4,12,11-3,21-3c5.52,0,0.78-7.81,7.5-11.5C351.5,385.5,353.5,370.5,351.5,357.5z M336.92,375 c-4.42,0.5-8.42-2.5-8.42-7.5s2-9-2-14s-3-13,6-10c3.42,1.14,8.67,8.52,8.83,16.26C341.5,367.5,341.33,374.5,336.92,375z"/>
    </g>
  </g>    
  <text class="txt" fill="#ff3880" x="360" y="390">Generate</text>
  <text class="txt" fill="#000" x="360" y="430" font-size="28" letter-spacing="3.3">Timetable</text>
  <rect class="titleHit" x="210" y="300" width="550" height="140" fill="rgba(0,0,0,0)">
</svg>


<div class="menu">
  <svg xmlns="http://www.w3.org/2000/svg" width="320" height="150" stroke-width="39" stroke-linecap="round">
    <mask id="m1">
      <line class="m mb1" stroke="#fff" x1="20" y1="56" x2="20" y2="120" />
    </mask>
    <mask id="m2">
      <line class="m mb2" stroke="#fff" x1="74" y1="56" x2="74" y2="120" />
    </mask>
    <mask id="m3">
      <line class="m mb3" stroke="#fff" x1="129" y1="56" x2="129" y2="120" />
    </mask>
    <mask id="m4">
      <line class="m mb4" stroke="#fff" x1="185" y1="56" x2="185" y2="120" />
    </mask>
    <mask id="m5">
      <line class="m mb5" stroke="#fff" x1="235" y1="56" x2="235" y2="120" />
    </mask>
    <mask id="m6">
      <line class="m mb6" stroke="#fff" x1="286" y1="56" x2="286" y2="120" />
    </mask>
    
    <path class="btn" id="b1" mask="url(#m1)" fill="#000000" d="M1,1h38c0,0,0,97.25,0,101.05c0,3.8,0,5.7-3.8,5.7s0.95,22.8-8.55,22.8s-2.85-22.8-9.18-22.8 c-4.12,0-3.17,6.65-6.97,6.65c-2.5,0-1.9-6.65-4.75-6.65S1,106.8,1,102.05S1,1,1,1z"/>
    <path class="btn" id="b2" mask="url(#m2)" fill="#5e3d08" d="M55,1h38c0,0,0,97.25,0,101.05c0,3.8-0.2,5.95-4,5.95c-8,0-1.5,18-11,18s-3.67-18-10-18 c-4.12,0-5.4-0.25-8.25-0.25S55,106.8,55,102.05S55,1,55,1z"/>
    <path class="btn" id="b3" mask="url(#m3)" fill="#ffdc82" d="M110,1h38c0,0,0,99.25,0,103.05c0,3.8,0,5.7-3.8,5.7S147.5,130,138,130s-5.67-19-12-19 c-4.12,0-5.48,1.32-6.5,2.4C118,115,114,115,113,114c-2.02-2.02-3-7.2-3-11.95S110,1,110,1z"/>
    <path class="btn" id="b4" mask="url(#m4)" fill="#7df0b9" d="M166,1h38c0,0,0,97.25,0,101.05c0,3.8-0.2,5.95-4,5.95c-8,0-1.5,12-11,12c-7,0-3.67-12-10-12 c-4.12,0-5.4-0.25-8.25-0.25s-4.75-0.95-4.75-5.7S166,1,166,1z"/>
    <path class="btn" id="b5" mask="url(#m5)" fill="#ff3880" d="M216,1h38c0,0,0,97.25,0,101.05c0,3.8-0.2,5.95-4,5.95c-17,0-16,2-16,21c0,8-8,7-8,0c0-21-1-21-5.25-21.25 c-2.85-0.17-4.75-0.95-4.75-5.7S216,1,216,1z"/>
    <path class="btn" id="b6" mask="url(#m6)" fill="#7268e5" d="M267,1h38c0,0,0,99.25,0,103.05c0,3.8,0,5.7-3.8,5.7c-9.2,0-0.7,17.25-10.2,17.25c-8,0-2.67-17-9-17 c-4,0-9,0-9,2c0,3.16,0,8-3,8s-3-3.2-3-7.95S267,1,267,1z"/>
    
    
  </svg>
</div>
  
</div>