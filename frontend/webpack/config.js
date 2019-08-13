// @flow
'use strict';

const define = require('./define');
const loaders = require('./loaders');
const localIp = require('my-local-ip');
const optimization = require('./optimization');
const plugins = require('./plugins');
const resolve = require('./resolve');
const Dotenv = require('dotenv-webpack');

module.exports = {
	entry: {
		'index': ['babel-polyfill', './src/index.js']
	},
	mode: define.mode,
	module: loaders,
	optimization,
	output: {
		filename: 'bundle.js',
		path: define.dist
	},
	plugins: [...plugins, new Dotenv()],
	resolve
};
