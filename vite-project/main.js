import './style.css';

import * as THREE from 'three';

// import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';
import { FirstPersonControls } from 'three/addons/controls/FirstPersonControls.js';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({
	canvas: document.querySelector('#bg'),
});

renderer.setPixelRatio(window.devicePixelRatio);
renderer.setSize(window.innerWidth, window.innerHeight);
camera.position.set(0, 5, 15);

renderer.render(scene, camera);

const geometry = new THREE.TorusGeometry(5, 1, 16, 50);
const material = new THREE.MeshStandardMaterial({ color: 0xff6347 });
const torus = new THREE.Mesh(geometry, material);

// scene.add(torus);

const pointLight = new THREE.PointLight(0xffffff, 10);
pointLight.position.set(0, 6, 2);

const ambientLight = new THREE.AmbientLight(0xffffff, 10);
scene.add(pointLight, ambientLight);

const lightHelper = new THREE.PointLightHelper(pointLight);
const gridHelper = new THREE.GridHelper();
scene.add(lightHelper, gridHelper);

// monki
const loader = new GLTFLoader();

loader.load(
	'public/models/podium.glb',
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

function animate() {
	requestAnimationFrame(animate);

	torus.rotation.z += 0.05;
	torus.rotation.x += 0.01;
	torus.rotation.y += 0.01;

	// controls.update();
	controls.update(0.1);

	renderer.render(scene, camera);
}

animate();
