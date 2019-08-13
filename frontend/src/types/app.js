// @flow
import {APP_EVENTS} from 'constants/app';

type ActionExample = {
	type: typeof APP_EVENTS.ACTION_EXAMPLE
};

type UnknownAppAction = {
	type: typeof APP_EVENTS.UNKNOWN,
	payload?: any
};

export type AppAction =
	| ActionExample
	| UnknownAppAction;

export type AppState = {
	counter: number
};
