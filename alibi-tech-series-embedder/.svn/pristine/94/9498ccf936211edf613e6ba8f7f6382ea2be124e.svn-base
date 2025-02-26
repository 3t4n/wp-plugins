export declare type WidgetMessageType = 'resize';
export declare type widgetSize = 'filmStrip' | 'filmStripAndPlayer' | 'product';
export declare type WidgetMessagePayload = {
    readonly SIGNATURE: 'alibi-tech-message';
    readonly messageType: WidgetMessageType;
    readonly newSize?: widgetSize;
};
export declare class WidgetLib {
    private static sendParent;
    static setSize(size: widgetSize): void;
    static widgetMessage(origin: string, event: MessageEvent): WidgetMessagePayload | undefined;
}
