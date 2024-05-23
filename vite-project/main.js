import './style.css';

import * as THREE from 'three';
import gsap from 'gsap';

// import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';
import { FirstPersonControls } from 'three/addons/controls/FirstPersonControls.js';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 100);
const renderer = new THREE.WebGLRenderer({
	canvas: document.querySelector('#bg'),
});

// Update aspect ratio when resizing window
// Source: https://www.youtube.com/watch?v=r4bepZ2PEUw
window.addEventListener('resize', function () {
	const width = window.innerWidth;
	const height = window.innerHeight;
	renderer.setSize(width, height);
	camera.aspect = width / height;
	camera.updateProjectionMatrix();
});

// fog
scene.fog = new THREE.Fog(0x000000, 1, 40);

renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(window.innerWidth, window.innerHeight);
camera.position.set(5, 5, -5);
camera.rotation.set(0, 2, 0);

// change views
const theaterView = document.getElementById('theaterView');
const kioskView = document.getElementById('kioskView');
const peopleView = document.getElementById('peopleView');

// theater view
theaterView.addEventListener('click', function () {
	gsap.to(camera.position, {
    x: 8,
    y: 5,
		z: 0,
		duration: 1.5,
	});

	gsap.to(camera.rotation, {
    x: 0,
    y: 1.5,
		z: 0,
		duration: 1.5,
	});
});

// kioskview
kioskView.addEventListener('click', function () {
	gsap.to(camera.position, {
    x: -5,
		y: 5,
    z: 0,
		duration: 1.5,
	});

	gsap.to(camera.rotation, {
    x: 0,
		y: 0,
    z: 0,
		duration: 1.5,
	});
});

// peopleview
peopleView.addEventListener('click', function () {
	gsap.to(camera.position, {
    x: -5,
		y: 5,
    z: 0,
		duration: 1.5,
	});

	gsap.to(camera.rotation, {
    x: 0,
		y: 3.1,
    z: 0,
		duration: 1.5,
	});
});

renderer.render(scene, camera);


// lights
const pointLight = new THREE.PointLight(0xffffff, 40);
pointLight.position.set(-5, 6, 0);

const spotLight = new THREE.SpotLight(0xffffff, 50);
spotLight.position.set(-8, 10, 0);
spotLight.angle = Math.PI / 10;

const ambientLight = new THREE.AmbientLight(0xffffff, .5);
scene.add(spotLight, ambientLight);

// spotlight target
const spotLightTarget = new THREE.Object3D();
spotLightTarget.position.set(-8, 0, 0);
scene.add(spotLightTarget);
spotLight.target = spotLightTarget;

const lightHelper = new THREE.PointLightHelper(pointLight);
const spotLightHelper = new THREE.SpotLightHelper(spotLight);
const gridHelper = new THREE.GridHelper();
scene.add(spotLightHelper);

// monki
const loader = new GLTFLoader();

loader.load(
	'public/models/stage.glb',
	function (gltf) {
		scene.add(gltf.scene);
	},
	undefined,
	function (error) {
		console.error(error);
	}
);

// const controls = new OrbitControls(camera, renderer.domElement)
const controls = new FirstPersonControls(camera, renderer.domElement);
controls.movementSpeed = 1;
controls.lookSpeed = 0.01;
controls.enabled = false;
// controls.activeLook = false;

// chatgpt particles
// Particle setup
const particleCount = 200;
const geometry = new THREE.SphereGeometry(0.005, 16, 16);
const material = new THREE.MeshBasicMaterial({ color: 0xffffff, transparent: true, opacity: 0.5 });
const instancedMesh = new THREE.InstancedMesh(geometry, material, particleCount);
scene.add(instancedMesh);

// Initialize particle data
const dummy = new THREE.Object3D();
const particles = [];
const boxSize = 20;
const particleSpeed = 0.005;
for (let i = 0; i < particleCount; i++) {
	const particle = {
		position: new THREE.Vector3((Math.random() - 0.5) * boxSize, (Math.random() - 0.5) * boxSize, (Math.random() - 0.5) * boxSize),
		velocity: new THREE.Vector3((Math.random() - 0.5) * particleSpeed, (Math.random() - 0.5) * particleSpeed, (Math.random() - 0.5) * particleSpeed),
	};
	particles.push(particle);
}

function animate() {
	requestAnimationFrame(animate);

	// controls.update();
	controls.update(0.1);

	for (let i = 0; i < particleCount; i++) {
		const particle = particles[i];
		particle.position.add(particle.velocity);

		// Bounce off the edges
		if (particle.position.x < -5 || particle.position.x > 5) particle.velocity.x *= -1;
		if (particle.position.y < -5 || particle.position.y > 5) particle.velocity.y *= -1;
		if (particle.position.z < -5 || particle.position.z > 5) particle.velocity.z *= -1;

		// Update instance matrix
		dummy.position.copy(particle.position);
		dummy.updateMatrix();
		instancedMesh.setMatrixAt(i, dummy.matrix);
	}

	instancedMesh.instanceMatrix.needsUpdate = true;

	renderer.render(scene, camera);
}

animate();
