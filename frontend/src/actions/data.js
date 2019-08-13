// @flow
import type { Dispatch, GetState, ThunkAction } from 'types';
import {
	moveToArchive,
	moveToActual,
	fetchDataRequest,
	fetchDataSuccess,
	fetchDataError,
	setMetaList,
	fetchNewsSuccess,
	fetchArchiveSuccess,
	updateNews
} from '../init/data';
import API from '../api';

const moveToArchiveAction = (itemId: string): ThunkAction => (
	dispatch: Dispatch,
	getState?: GetState
): void => {
	dispatch(moveToArchive(itemId));
	API.post(`/archive/set/${itemId}`, { uuid: itemId });
};

const moveToActualAction = (itemId: string): ThunkAction => (
	dispatch: Dispatch,
	getState?: GetState
): void => {
	dispatch(moveToActual(itemId));
	API.post(`/archive/remove/${itemId}`, { uuid: itemId });
};

const getMetaList = (url: string): ThunkAction => (
	dispatch: Dispatch,
	getState?: GetState
): void => {
	dispatch(fetchDataRequest);
	API.get(`/meta/${url}`)
		.then(response => {
			dispatch(setMetaList(response));
			dispatch(fetchDataSuccess);
			return null;
		})
		.catch(error => {
			console.error(error); //eslint-disable-line
			dispatch(fetchDataError);
		});
};

const getNewsList = (url: string): ThunkAction => (
	dispatch: Dispatch,
	getState?: GetState
): void => {
	dispatch(fetchDataRequest);
	API.get(`/list/${url}`)
		.then(response => {
			dispatch(fetchNewsSuccess(response));
			dispatch(fetchDataSuccess);
			return null;
		})
		.catch(error => {
			console.error(error); //eslint-disable-line
			dispatch(fetchDataError);
		});
};

const getArchiveList = (url: string): ThunkAction => (
	dispatch: Dispatch,
	getState?: GetState
): void => {
	dispatch(fetchDataRequest);
	API.get(`/archive/${url}`)
		.then(response => {
			dispatch(fetchArchiveSuccess(response));
			dispatch(fetchDataSuccess);
			return null;
		})
		.catch(error => {
			console.error(error); //eslint-disable-line
			dispatch(fetchDataError);
		});
};

const updateNewsAction = (url: string, newsData: Object): ThunkAction => (
	dispatch: Dispatch,
	getState?: GetState
): void => {
	dispatch(updateNews(newsData));
	API.post(`/list/${url}/${newsData.uuid}`, newsData);
};

export {
	moveToArchiveAction,
	moveToActualAction,
	getMetaList,
	getNewsList,
	getArchiveList,
	updateNewsAction
};
