// @flow
import app from './app';
import data from './data';
import { combineReducers } from 'redux';

export const root = combineReducers({
	app,
	data
});

export default root;
