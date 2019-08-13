// @flow
import { DATA_EVENTS } from 'constants/data';
import type { DataAction, DataState } from 'types/data';
import { initialDataState } from 'init/data';

export const data = (state: DataState = initialDataState, action: DataAction): DataState => {
	switch (action.type) {
		case DATA_EVENTS.FETCH_DATA_REQUEST:
			return {
				...state,
				loading: true,
				error: false
			};
		case DATA_EVENTS.FETCH_DATA_SUCCESS:
			return {
				...state,
				loading: false
			};
		case DATA_EVENTS.FETCH_DATA_ERROR:
			return {
				...state,
				loading: false,
				error: true
			};

		case DATA_EVENTS.MOVE_TO_ARCHIVE: {
			const archiveIndex = action.payload;
			return {
				...state,
				news: state.news.filter(item => item.uuid !== archiveIndex)
			};
		}
		case DATA_EVENTS.MOVE_TO_ACTUAL: {
			const actualIndex = action.payload;
			return {
				...state,
				archive: state.archive.filter(item => item.uuid !== actualIndex)
			};
		}
		case DATA_EVENTS.SET_META_LIST:
			return {
				...state,
				meta: action.payload
			};
		case DATA_EVENTS.FETCH_NEWS_SUCCESS: {
			return {
				...state,
				news: action.payload
			};
		}
		case DATA_EVENTS.FETCH_ARCHIVE_SUCCESS: {
			return {
				...state,
				archive: action.payload
			};
		}
		case DATA_EVENTS.UPDATE_NEWS: {
			return {
				...state,
				news: state.news.map(item => (item.uuid === action.payload.uuid ? action.payload : item))
			};
		}
		default:
			return state;
	}
};

export default data;
