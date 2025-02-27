import {Animate, Button, Flex, FlexItem, Notice} from '@wordpress/components';
import DataTable from 'react-data-table-component';
import {StatisticsContext} from "../context/StatisticsContext";
import {useContext, useState} from "@wordpress/element";

const {__} = wp.i18n;

function StatisticsPage() {
    const {statistics, resetStatistics} = useContext(StatisticsContext);
    const [isReset, setIsReset] = useState(false);

    const runResetStatistics = () => {
        resetStatistics();
        setIsReset(true);

        setTimeout(function () {
            setIsReset(false);
        }, 2000);

    }

    const columns = [
        {
            name: __('Password', 'content-protector'),
            selector: row => row.password,
            sortable: true,
        },
        {
            name: __('Number of Usages', 'content-protector'),
            selector: row => row.number_of_usages,
            sortable: true,
        },
        {
            name: __('First Usage', 'content-protector'),
            selector: row => row.first_usage,
            sortable: true,
        },
        {
            name: __('IP Address', 'content-protector'),
            selector: row => row.ip,
        },
        {
            name: __('Browser', 'content-protector'),
            selector: row => row.browser,
        },
    ];


    return (
        <div className={"plugin-settings-container"}>
            <div className={"header"}>
                <Flex>
                    <FlexItem>
                        <div className={"plugin-logo"}>
                            <img alt="Logo"
                                 src={options.logo}/>
                        </div>
                    </FlexItem>
                    <FlexItem>
                        {/* eslint-disable-next-line no-undef */}
                        <p>Version: <b>{options.version}</b></p>
                    </FlexItem>
                    <FlexItem>
                        <Button onClick={runResetStatistics} variant="primary">
                            {__('Reset Statistics', 'content-protector')}
                        </Button>
                        {isReset ?
                            <Animate type="slide-in" options={{origin: 'top'}}>
                                {() => (
                                    <Notice status="success" isDismissible={false}>
                                        <p>
                                            {__('Statistics resetted successfully.', 'content-protector')}
                                        </p>
                                    </Notice>
                                )}
                            </Animate>
                            :
                            ''
                        }
                    </FlexItem>
                </Flex>
            </div>
            <div className={"content"}>
                {statistics &&
                    <DataTable
                        columns={columns}
                        data={statistics}
                        pagination
                    />
                }
            </div>
        </div>
    )
}

export default StatisticsPage;