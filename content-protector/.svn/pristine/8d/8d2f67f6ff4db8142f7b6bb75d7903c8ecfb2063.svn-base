import {useState, createContext, useEffect} from "@wordpress/element";
import apiFetch from '@wordpress/api-fetch';

const {__} = wp.i18n;

export const StatisticsContext = createContext();

function StatisticsContextProvider(props) {
    const [statistics, setStatistics] = useState();

    const getStatistics = () => {
        apiFetch({path: '/passster/v1/statistics'}).then((data) => {

            if( data ) {
                setStatistics(data);
            } else {
                setStatistics([]);
            }
        });
    }

    const resetStatistics = () => {
        apiFetch({
            path: '/passster/v1/reset-statistics',
            method: 'POST',
            reset: true,
        });
    }


    useEffect(() => {
        getStatistics();
    }, []);


    return (
        <StatisticsContext.Provider
            value={{
                statistics,
                resetStatistics,
            }}
        >
            {props.children}
        </StatisticsContext.Provider>
    );
}

export default StatisticsContextProvider;
