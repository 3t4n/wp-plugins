import * as $protobuf from "protobufjs";
/** ErrorCodes enum. */
export enum ErrorCodes {
    ConferenceWithPinDoesNotExist = -1,
    ConferenceWithPinAlreadyExists = -2,
    ConferencePinAndIdDoesNotMatch = -3,
    ConferenceAccessDenied = -4,
    ConferenceIsCancelled = -5,
    ConferencePinIsReadOnly = -6,
    ConferenceInvalidPin = -7,
    CannotGeneratePin = -8,
    FwdProfileDoesNotExist = -9,
    FwdProfileOverrideExpirationRequired = -10,
    Success = 0,
    NoSuchRequest = 1,
    ExceptionOccured = 2,
    RequestIsNotSupported = 3,
    ServerIsBusy = 4,
    BridgeNotFound = 5,
    CannotCleanOwnExtension = 6,
    SetWakeupCallResult = 7,
    ExtensionNotFound = 8,
    NoPermission = 9,
    WebMeetingNoEmail = 12,
    WebMeetingNoAccess = 13,
    WebMeetingInvalidOrganizer = 16,
    WebMeetingInvalidParameters = 17,
    WebMeetingInvalidParticipant = 18,
    WebMeetingInvalidPin = 19,
    WebMeetingAccessDenied = 20,
    WebMeetingNotFound = 21,
    WebMeetingCannotDeleteQM = 22,
    WebMeetingPinIsReadonly = 23,
    WebMeetingNumberToCallIsReadonly = 24,
    WebMeetingInvalidWmUser = 25,
    ExtensionEmailRequired = 30,
    QueueNumberRequired = 31,
    ChatIsDisabled = 32,
    PersonalContactRequired = 33,
    RequiredFieldIsEmpty = 34,
    ContactNotFound = 35,
    ContactIsReadonly = 36,
    ActionIsNotAllowed = 37,
    FileNotFound = 38,
    OwnRecordingsDenied = 39,
    InvalidValue = 40,
    InvalidMedia = 41,
    InvalidOperation = 42,
    OperationFailed = 43
}

/** ActionType enum. */
export enum ActionType {
    NoUpdates = 0,
    FullUpdate = 1,
    Inserted = 2,
    Updated = 3,
    Deleted = 4
}

/** ChatFileState enum. */
export enum ChatFileState {
    CF_Uploading = 0,
    CF_Available = 1,
    CF_Deleted = 2
}

/** Represents a Login. */
export class Login {

    /**
     * Constructs a new Login.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<Login>);

    /** Login User. */
    public User: string;

    /** Login Password. */
    public Password: string;

    /** Login ClientVersion. */
    public ClientVersion: string;

    /** Login ClientInfo. */
    public ClientInfo: string;

    /** Login ProtocolVersion. */
    public ProtocolVersion: string;

    /**
     * Encodes the specified Login message. Does not implicitly {@link Login.verify|verify} messages.
     * @param message Login message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: Login, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a Login message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns Login
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): Login;

    /**
     * Converts a Login message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a LoginInfo. */
export class LoginInfo {

    /**
     * Constructs a new LoginInfo.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<LoginInfo>);

    /** LoginInfo ExtensionId. */
    public ExtensionId: number;

    /** LoginInfo IsAuthenticated. */
    public IsAuthenticated: boolean;

    /** LoginInfo ValidationMessage. */
    public ValidationMessage: string;

    /** LoginInfo Nonce. */
    public Nonce: string;

    /** LoginInfo SessionId. */
    public SessionId: string;

    /** LoginInfo AddpTimeout. */
    public AddpTimeout: number;

    /** LoginInfo ServerVersion. */
    public ServerVersion: string;

    /** LoginInfo UpdateAvailable. */
    public UpdateAvailable: boolean;

    /** LoginInfo LicenseType. */
    public LicenseType: number;

    /** LoginInfo LicenseProduct. */
    public LicenseProduct: string;

    /** LoginInfo PbxVersion. */
    public PbxVersion: string;

    /**
     * Encodes the specified LoginInfo message. Does not implicitly {@link LoginInfo.verify|verify} messages.
     * @param message LoginInfo message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: LoginInfo, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a LoginInfo message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns LoginInfo
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): LoginInfo;

    /**
     * Converts a LoginInfo message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a DateTime. */
export class DateTime {

    /**
     * Constructs a new DateTime.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<DateTime>);

    /** DateTime Year. */
    public Year: number;

    /** DateTime Month. */
    public Month: number;

    /** DateTime Day. */
    public Day: number;

    /** DateTime Hour. */
    public Hour: number;

    /** DateTime Minute. */
    public Minute: number;

    /** DateTime Second. */
    public Second: number;

    /**
     * Encodes the specified DateTime message. Does not implicitly {@link DateTime.verify|verify} messages.
     * @param message DateTime message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: DateTime, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a DateTime message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns DateTime
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): DateTime;
}

/** Represents a Registration. */
export class Registration {

    /**
     * Constructs a new Registration.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<Registration>);

    /** Registration Action. */
    public Action: ActionType;

    /** Registration Id. */
    public Id: number;

    /** Registration Contact. */
    public Contact: string;

    /** Registration SourceAddress. */
    public SourceAddress: string;

    /** Registration UserAgent. */
    public UserAgent: string;

    /** Registration ExpiresAt. */
    public ExpiresAt: DateTime;

    /**
     * Encodes the specified Registration message. Does not implicitly {@link Registration.verify|verify} messages.
     * @param message Registration message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: Registration, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a Registration message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns Registration
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): Registration;
}

/** Represents a Registrations. */
export class Registrations {

    /**
     * Constructs a new Registrations.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<Registrations>);

    /** Registrations Action. */
    public Action: ActionType;

    /** Registrations Items. */
    public Items: Registration[];

    /**
     * Encodes the specified Registrations message. Does not implicitly {@link Registrations.verify|verify} messages.
     * @param message Registrations message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: Registrations, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a Registrations message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns Registrations
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): Registrations;
}

/** Represents a MyExtensionInfo. */
export class MyExtensionInfo {

    /**
     * Constructs a new MyExtensionInfo.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<MyExtensionInfo>);

    /** MyExtensionInfo Action. */
    public Action: ActionType;

    /** MyExtensionInfo Id. */
    public Id: number;

    /** MyExtensionInfo Number. */
    public Number: string;

    /** MyExtensionInfo QueueStatus. */
    public QueueStatus: boolean;

    /** MyExtensionInfo ActiveDevices. */
    public ActiveDevices: Registrations;

    /**
     * Encodes the specified MyExtensionInfo message. Does not implicitly {@link MyExtensionInfo.verify|verify} messages.
     * @param message MyExtensionInfo message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: MyExtensionInfo, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a MyExtensionInfo message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns MyExtensionInfo
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): MyExtensionInfo;

    /**
     * Converts a MyExtensionInfo message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a RequestMyInfo. */
export class RequestMyInfo {

    /**
     * Constructs a new RequestMyInfo.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<RequestMyInfo>);

    /**
     * Encodes the specified RequestMyInfo message. Does not implicitly {@link RequestMyInfo.verify|verify} messages.
     * @param message RequestMyInfo message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: RequestMyInfo, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a RequestMyInfo message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns RequestMyInfo
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): RequestMyInfo;

    /**
     * Converts a RequestMyInfo message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a ResponseAcknowledge. */
export class ResponseAcknowledge {

    /**
     * Constructs a new ResponseAcknowledge.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<ResponseAcknowledge>);

    /** ResponseAcknowledge Success. */
    public Success: boolean;

    /** ResponseAcknowledge ErrorCode. */
    public ErrorCode: number;

    /** ResponseAcknowledge Message. */
    public Message: string;

    /** ResponseAcknowledge ExceptionType. */
    public ExceptionType: string;

    /** ResponseAcknowledge ExceptionMessage. */
    public ExceptionMessage: string;

    /** ResponseAcknowledge ErrorType. */
    public ErrorType: ErrorCodes;

    /** ResponseAcknowledge Parameter. */
    public Parameter: string;

    /**
     * Encodes the specified ResponseAcknowledge message. Does not implicitly {@link ResponseAcknowledge.verify|verify} messages.
     * @param message ResponseAcknowledge message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: ResponseAcknowledge, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a ResponseAcknowledge message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns ResponseAcknowledge
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): ResponseAcknowledge;

    /**
     * Converts a ResponseAcknowledge message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a ChatRecipient. */
export class ChatRecipient {

    /**
     * Constructs a new ChatRecipient.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<ChatRecipient>);

    /** ChatRecipient ExtNumber. */
    public ExtNumber: string;

    /** ChatRecipient Name. */
    public Name: string;

    /** ChatRecipient BridgeNumber. */
    public BridgeNumber: string;

    /**
     * Encodes the specified ChatRecipient message. Does not implicitly {@link ChatRecipient.verify|verify} messages.
     * @param message ChatRecipient message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: ChatRecipient, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a ChatRecipient message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns ChatRecipient
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): ChatRecipient;
}

/** Represents a ChatMessage. */
export class ChatMessage {

    /**
     * Constructs a new ChatMessage.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<ChatMessage>);

    /** ChatMessage Id. */
    public Id: number;

    /** ChatMessage SenderNumber. */
    public SenderNumber: string;

    /** ChatMessage SenderName. */
    public SenderName: string;

    /** ChatMessage SenderBridgeNumber. */
    public SenderBridgeNumber: string;

    /** ChatMessage Recipient. */
    public Recipient: ChatRecipient;

    /** ChatMessage Message. */
    public Message: string;

    /** ChatMessage Time. */
    public Time: DateTime;

    /** ChatMessage IsNew. */
    public IsNew: boolean;

    /** ChatMessage Party. */
    public Party: string;

    /** ChatMessage PartyNew. */
    public PartyNew: string;

    /** ChatMessage File. */
    public File: ChatFile;

    /**
     * Encodes the specified ChatMessage message. Does not implicitly {@link ChatMessage.verify|verify} messages.
     * @param message ChatMessage message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: ChatMessage, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a ChatMessage message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns ChatMessage
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): ChatMessage;
}

/** Represents a ChatFile. */
export class ChatFile {

    /**
     * Constructs a new ChatFile.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<ChatFile>);

    /** ChatFile FileName. */
    public FileName: string;

    /** ChatFile FileLink. */
    public FileLink: string;

    /** ChatFile FileState. */
    public FileState: ChatFileState;

    /** ChatFile Progress. */
    public Progress: number;

    /** ChatFile HasPreview. */
    public HasPreview: boolean;

    /** ChatFile FileSize. */
    public FileSize: number;

    /**
     * Encodes the specified ChatFile message. Does not implicitly {@link ChatFile.verify|verify} messages.
     * @param message ChatFile message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: ChatFile, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a ChatFile message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns ChatFile
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): ChatFile;
}

/** Represents a NotificationChatFileProgress. */
export class NotificationChatFileProgress {

    /**
     * Constructs a new NotificationChatFileProgress.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<NotificationChatFileProgress>);

    /** NotificationChatFileProgress Id. */
    public Id: number;

    /** NotificationChatFileProgress Party. */
    public Party: string;

    /** NotificationChatFileProgress File. */
    public File: ChatFile;

    /**
     * Encodes the specified NotificationChatFileProgress message. Does not implicitly {@link NotificationChatFileProgress.verify|verify} messages.
     * @param message NotificationChatFileProgress message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: NotificationChatFileProgress, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a NotificationChatFileProgress message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns NotificationChatFileProgress
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): NotificationChatFileProgress;

    /**
     * Converts a NotificationChatFileProgress message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a RequestSendChatMessage. */
export class RequestSendChatMessage {

    /**
     * Constructs a new RequestSendChatMessage.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<RequestSendChatMessage>);

    /** RequestSendChatMessage Message. */
    public Message: string;

    /** RequestSendChatMessage Recipients. */
    public Recipients: ChatRecipient[];

    /** RequestSendChatMessage SipFrom. */
    public SipFrom: string;

    /**
     * Encodes the specified RequestSendChatMessage message. Does not implicitly {@link RequestSendChatMessage.verify|verify} messages.
     * @param message RequestSendChatMessage message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: RequestSendChatMessage, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a RequestSendChatMessage message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns RequestSendChatMessage
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): RequestSendChatMessage;

    /**
     * Converts a RequestSendChatMessage message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a RequestSendChatFile. */
export class RequestSendChatFile {

    /**
     * Constructs a new RequestSendChatFile.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<RequestSendChatFile>);

    /** RequestSendChatFile Name. */
    public Name: string;

    /** RequestSendChatFile Party. */
    public Party: string;

    /**
     * Encodes the specified RequestSendChatFile message. Does not implicitly {@link RequestSendChatFile.verify|verify} messages.
     * @param message RequestSendChatFile message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: RequestSendChatFile, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a RequestSendChatFile message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns RequestSendChatFile
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): RequestSendChatFile;

    /**
     * Converts a RequestSendChatFile message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a ResponseMyMessages. */
export class ResponseMyMessages {

    /**
     * Constructs a new ResponseMyMessages.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<ResponseMyMessages>);

    /** ResponseMyMessages Messages. */
    public Messages: ChatMessage[];

    /**
     * Encodes the specified ResponseMyMessages message. Does not implicitly {@link ResponseMyMessages.verify|verify} messages.
     * @param message ResponseMyMessages message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: ResponseMyMessages, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a ResponseMyMessages message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns ResponseMyMessages
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): ResponseMyMessages;

    /**
     * Converts a ResponseMyMessages message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a RequestSetChatReceived. */
export class RequestSetChatReceived {

    /**
     * Constructs a new RequestSetChatReceived.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<RequestSetChatReceived>);

    /** RequestSetChatReceived Items. */
    public Items: number[];

    /**
     * Encodes the specified RequestSetChatReceived message. Does not implicitly {@link RequestSetChatReceived.verify|verify} messages.
     * @param message RequestSetChatReceived message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: RequestSetChatReceived, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a RequestSetChatReceived message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns RequestSetChatReceived
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): RequestSetChatReceived;

    /**
     * Converts a RequestSetChatReceived message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** ====================================================================== */
export class MyWebRTCEndpoint {

    /**
     * Constructs a new MyWebRTCEndpoint.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<MyWebRTCEndpoint>);

    /** MyWebRTCEndpoint Action. */
    public Action: ActionType;

    /** MyWebRTCEndpoint Items. */
    public Items: WebRTCCall[];

    /** MyWebRTCEndpoint isWebRTCEnpointRegistered. */
    public isWebRTCEnpointRegistered: boolean;

    /** MyWebRTCEndpoint DeviceContact. */
    public DeviceContact: string;

    /**
     * Encodes the specified MyWebRTCEndpoint message. Does not implicitly {@link MyWebRTCEndpoint.verify|verify} messages.
     * @param message MyWebRTCEndpoint message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: MyWebRTCEndpoint, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a MyWebRTCEndpoint message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns MyWebRTCEndpoint
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): MyWebRTCEndpoint;

    /**
     * Converts a MyWebRTCEndpoint message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** WebRTCEndpointSDPState enum. */
export enum WebRTCEndpointSDPState {
    WRTCTerminate = 0,
    WRTCOffer = 1,
    WRTCAnswer = 2,
    WRTCConfirm = 3,
    WRTCRequestForOffer = 4,
    WRTCReject = 5,
    WRTCProcessingOffer = 6,
    WRTCPreparingOffer = 7,
    WRTCAnswerProvided = 8,
    WRTCConfirmed = 9,
    WRTCInitial = 10
}

/** WebRTCHoldState enum. */
export enum WebRTCHoldState {
    WebRTCHoldState_NOHOLD = 0,
    WebRTCHoldState_HELD = 1,
    WebRTCHoldState_HOLD = 2,
    WebRTCHoldState_BOTH = 3
}

/** Represents a WebRTCCall. */
export class WebRTCCall {

    /**
     * Constructs a new WebRTCCall.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<WebRTCCall>);

    /** WebRTCCall Action. */
    public Action: ActionType;

    /** WebRTCCall Id. */
    public Id: number;

    /** WebRTCCall sdpType. */
    public sdpType: WebRTCEndpointSDPState;

    /** WebRTCCall otherPartyDisplayname. */
    public otherPartyDisplayname: string;

    /** WebRTCCall otherPartyNumber. */
    public otherPartyNumber: string;

    /** WebRTCCall transactionId. */
    public transactionId: number;

    /** WebRTCCall sdp. */
    public sdp: string;

    /** WebRTCCall SIPDialogID. */
    public SIPDialogID: string;

    /** WebRTCCall holdState. */
    public holdState: WebRTCHoldState;

    /**
     * Encodes the specified WebRTCCall message. Does not implicitly {@link WebRTCCall.verify|verify} messages.
     * @param message WebRTCCall message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: WebRTCCall, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a WebRTCCall message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns WebRTCCall
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): WebRTCCall;
}

/** Represents a RequestWebRTCChangeSDPState. */
export class RequestWebRTCChangeSDPState {

    /**
     * Constructs a new RequestWebRTCChangeSDPState.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<RequestWebRTCChangeSDPState>);

    /** RequestWebRTCChangeSDPState Id. */
    public Id: number;

    /** RequestWebRTCChangeSDPState sdpType. */
    public sdpType: WebRTCEndpointSDPState;

    /** RequestWebRTCChangeSDPState transactionId. */
    public transactionId: number;

    /** RequestWebRTCChangeSDPState sdp. */
    public sdp: string;

    /** RequestWebRTCChangeSDPState destinationNumber. */
    public destinationNumber: string;

    /** RequestWebRTCChangeSDPState CallerDisplayName. */
    public CallerDisplayName: string;

    /** RequestWebRTCChangeSDPState CallerID. */
    public CallerID: string;

    /**
     * Encodes the specified RequestWebRTCChangeSDPState message. Does not implicitly {@link RequestWebRTCChangeSDPState.verify|verify} messages.
     * @param message RequestWebRTCChangeSDPState message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: RequestWebRTCChangeSDPState, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a RequestWebRTCChangeSDPState message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns RequestWebRTCChangeSDPState
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): RequestWebRTCChangeSDPState;

    /**
     * Converts a RequestWebRTCChangeSDPState message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a ResponseWebRTCChangeSDPState. */
export class ResponseWebRTCChangeSDPState {

    /**
     * Constructs a new ResponseWebRTCChangeSDPState.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<ResponseWebRTCChangeSDPState>);

    /** ResponseWebRTCChangeSDPState Success. */
    public Success: boolean;

    /** ResponseWebRTCChangeSDPState Message. */
    public Message: string;

    /** ResponseWebRTCChangeSDPState CallId. */
    public CallId: number;

    /**
     * Encodes the specified ResponseWebRTCChangeSDPState message. Does not implicitly {@link ResponseWebRTCChangeSDPState.verify|verify} messages.
     * @param message ResponseWebRTCChangeSDPState message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: ResponseWebRTCChangeSDPState, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a ResponseWebRTCChangeSDPState message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns ResponseWebRTCChangeSDPState
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): ResponseWebRTCChangeSDPState;

    /**
     * Converts a ResponseWebRTCChangeSDPState message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a WebRTCTransferCall. */
export class WebRTCTransferCall {

    /**
     * Constructs a new WebRTCTransferCall.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<WebRTCTransferCall>);

    /** WebRTCTransferCall Id. */
    public Id: number;

    /** WebRTCTransferCall destination. */
    public destination: string;

    /** WebRTCTransferCall ToCallId. */
    public ToCallId: number;

    /**
     * Encodes the specified WebRTCTransferCall message. Does not implicitly {@link WebRTCTransferCall.verify|verify} messages.
     * @param message WebRTCTransferCall message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: WebRTCTransferCall, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a WebRTCTransferCall message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns WebRTCTransferCall
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): WebRTCTransferCall;
}

/** Represents a RequestRegisterWebRTCEndpoint. */
export class RequestRegisterWebRTCEndpoint {

    /**
     * Constructs a new RequestRegisterWebRTCEndpoint.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<RequestRegisterWebRTCEndpoint>);

    /** RequestRegisterWebRTCEndpoint register. */
    public register: boolean;

    /**
     * Encodes the specified RequestRegisterWebRTCEndpoint message. Does not implicitly {@link RequestRegisterWebRTCEndpoint.verify|verify} messages.
     * @param message RequestRegisterWebRTCEndpoint message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: RequestRegisterWebRTCEndpoint, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a RequestRegisterWebRTCEndpoint message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns RequestRegisterWebRTCEndpoint
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): RequestRegisterWebRTCEndpoint;

    /**
     * Converts a RequestRegisterWebRTCEndpoint message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a ChatTyping. */
export class ChatTyping {

    /**
     * Constructs a new ChatTyping.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<ChatTyping>);

    /** ChatTyping Party. */
    public Party: string;

    /** ChatTyping User. */
    public User: string;

    /**
     * Encodes the specified ChatTyping message. Does not implicitly {@link ChatTyping.verify|verify} messages.
     * @param message ChatTyping message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: ChatTyping, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a ChatTyping message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns ChatTyping
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): ChatTyping;

    /**
     * Converts a ChatTyping message to GenericMessage
     * @returns GenericMessage
     */
    public toGenericMessage(): GenericMessage;
}

/** Represents a GenericMessage. */
export class GenericMessage {

    /**
     * Constructs a new GenericMessage.
     * @param [properties] Properties to set
     */
    constructor(properties?: Partial<GenericMessage>);

    /** GenericMessage MessageId. */
    public MessageId: number;

    /** GenericMessage LoginRequest. */
    public LoginRequest: Login;

    /** GenericMessage GetMyInfo. */
    public GetMyInfo: RequestMyInfo;

    /** GenericMessage SendChatMessage. */
    public SendChatMessage: RequestSendChatMessage;

    /** GenericMessage MessagesReceived. */
    public MessagesReceived: RequestSetChatReceived;

    /** GenericMessage registerWebRTC. */
    public registerWebRTC: RequestRegisterWebRTCEndpoint;

    /** GenericMessage ChangeSDPState. */
    public ChangeSDPState: RequestWebRTCChangeSDPState;

    /** GenericMessage SendChatFile. */
    public SendChatFile: RequestSendChatFile;

    /** GenericMessage UserTypingChat. */
    public UserTypingChat: ChatTyping;

    /** GenericMessage LoginResponse. */
    public LoginResponse: LoginInfo;

    /** GenericMessage MyInfo. */
    public MyInfo: MyExtensionInfo;

    /** GenericMessage Acknowledge. */
    public Acknowledge: ResponseAcknowledge;

    /** GenericMessage MyChatMessages. */
    public MyChatMessages: ResponseMyMessages;

    /** GenericMessage webRTCEndpoint. */
    public webRTCEndpoint: MyWebRTCEndpoint;

    /** GenericMessage ChangeSDPStateResponse. */
    public ChangeSDPStateResponse: ResponseWebRTCChangeSDPState;

    /** GenericMessage ChatFileProgress. */
    public ChatFileProgress: NotificationChatFileProgress;

    /**
     * Encodes the specified GenericMessage message. Does not implicitly {@link GenericMessage.verify|verify} messages.
     * @param message GenericMessage message or plain object to encode
     * @param [writer] Writer to encode to
     * @returns Writer
     */
    public static encode(message: GenericMessage, writer?: $protobuf.Writer): $protobuf.Writer;

    /**
     * Decodes a GenericMessage message from the specified reader or buffer.
     * @param reader Reader or buffer to decode from
     * @param [length] Message length if known beforehand
     * @returns GenericMessage
     * @throws {Error} If the payload is not a reader or valid buffer
     * @throws {$protobuf.util.ProtocolError} If required fields are missing
     */
    public static decode(reader: ($protobuf.Reader|Uint8Array), length?: number): GenericMessage;
}
