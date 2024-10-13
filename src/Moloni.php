<?php
namespace Geovanefss\LaravelApiMoloni;

// ACCOUNT AND PROFILE
use Geovanefss\LaravelApiMoloni\Http\AccountAndProfile\MyProfile;
// APIs' CLIENT
use Geovanefss\LaravelApiMoloni\Http\ApiClient;
use Geovanefss\LaravelApiMoloni\Http\Auth\Authorize;
// COMPANY
use Geovanefss\LaravelApiMoloni\Http\Company\Company;
use Geovanefss\LaravelApiMoloni\Http\Company\Subscription;
use Geovanefss\LaravelApiMoloni\Http\Company\Users;
// DOCUMENTS
use Geovanefss\LaravelApiMoloni\Http\Documents\BillsOfLanding;
use Geovanefss\LaravelApiMoloni\Http\Documents\CreditNotes;
use Geovanefss\LaravelApiMoloni\Http\Documents\CustomerReturnNotes;
use Geovanefss\LaravelApiMoloni\Http\Documents\DebitNotes;
use Geovanefss\LaravelApiMoloni\Http\Documents\DeliveryNotes;
use Geovanefss\LaravelApiMoloni\Http\Documents\Documents;
use Geovanefss\LaravelApiMoloni\Http\Documents\Estimates;
use Geovanefss\LaravelApiMoloni\Http\Documents\GlobalGuides;
use Geovanefss\LaravelApiMoloni\Http\Documents\InternalDocuments;
use Geovanefss\LaravelApiMoloni\Http\Documents\InvoiceReceipts;
use Geovanefss\LaravelApiMoloni\Http\Documents\Invoices;
use Geovanefss\LaravelApiMoloni\Http\Documents\OwnAssetsMovementGuides;
use Geovanefss\LaravelApiMoloni\Http\Documents\PaymentReturns;
use Geovanefss\LaravelApiMoloni\Http\Documents\PurchaseOrder;
use Geovanefss\LaravelApiMoloni\Http\Documents\Receipts;
use Geovanefss\LaravelApiMoloni\Http\Documents\SimplifiedInvoices;
use Geovanefss\LaravelApiMoloni\Http\Documents\SupplierCreditNotes;
use Geovanefss\LaravelApiMoloni\Http\Documents\SupplierDebitNotes;
use Geovanefss\LaravelApiMoloni\Http\Documents\SupplierInvoices;
use Geovanefss\LaravelApiMoloni\Http\Documents\SupplierPurchaseOrder;
use Geovanefss\LaravelApiMoloni\Http\Documents\SupplierReceipts;
use Geovanefss\LaravelApiMoloni\Http\Documents\SupplierReturnNotes;
use Geovanefss\LaravelApiMoloni\Http\Documents\SupplierSimplifiedInvoices;
use Geovanefss\LaravelApiMoloni\Http\Documents\SupplierWarrantyRequests;
use Geovanefss\LaravelApiMoloni\Http\Documents\Waybills;
// ENTITIES
use Geovanefss\LaravelApiMoloni\Http\Entities\CustomerAlternateAddresses;
use Geovanefss\LaravelApiMoloni\Http\Entities\Customers;
use Geovanefss\LaravelApiMoloni\Http\Entities\Salesman;
use Geovanefss\LaravelApiMoloni\Http\Entities\Suppliers;
// GLOBAL DATA
use Geovanefss\LaravelApiMoloni\Http\GlobalData\Countries;
use Geovanefss\LaravelApiMoloni\Http\GlobalData\Currencies;
use Geovanefss\LaravelApiMoloni\Http\GlobalData\CurrencyExchange;
use Geovanefss\LaravelApiMoloni\Http\GlobalData\DocumentModels;
use Geovanefss\LaravelApiMoloni\Http\GlobalData\FiscalZones;
use Geovanefss\LaravelApiMoloni\Http\GlobalData\Languages;
use Geovanefss\LaravelApiMoloni\Http\GlobalData\MultibancoGateways;
use Geovanefss\LaravelApiMoloni\Http\GlobalData\TaxExemptions;
// PRODUCTS
use Geovanefss\LaravelApiMoloni\Http\Products\PriceClasses;
use Geovanefss\LaravelApiMoloni\Http\Products\ProductCategories;
use Geovanefss\LaravelApiMoloni\Http\Products\Products;
use Geovanefss\LaravelApiMoloni\Http\Products\ProductStocks;
// SETTINGS
use Geovanefss\LaravelApiMoloni\Http\Settings\BankAccounts;
use Geovanefss\LaravelApiMoloni\Http\Settings\Deductions;
use Geovanefss\LaravelApiMoloni\Http\Settings\DocumentSets;
use Geovanefss\LaravelApiMoloni\Http\Settings\EconomicActivityClassificationCodes;
use Geovanefss\LaravelApiMoloni\Http\Settings\IdentificationTemplates;
use Geovanefss\LaravelApiMoloni\Http\Settings\MaturityDates;
use Geovanefss\LaravelApiMoloni\Http\Settings\MeasurementUnits;
use Geovanefss\LaravelApiMoloni\Http\Settings\PaymentMethods;
use Geovanefss\LaravelApiMoloni\Http\Settings\ProductProperties;
use Geovanefss\LaravelApiMoloni\Http\Settings\TaxAndFees;
use Geovanefss\LaravelApiMoloni\Http\Settings\Vehicles;
use Geovanefss\LaravelApiMoloni\Http\Settings\Warehouses;

class Moloni
{
    /**
     * API Client
     *
     * @var ApiClient $apiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param array $configs
     * @param string $apiVersion
     */
    public function __construct(array $configs = [], $apiVersion = 'v1')
    {
        $this->apiClient = new ApiClient($configs, $apiVersion);
    }

    /**
     * Get Base Url
     *
     * @param bool $debug
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->apiClient->getBaseUrl();
    }

    /**
     * Set Configs
     *
     * @param array $configs
     * @return void
     */
    public function setConfigs(array $configs): void
    {
        $this->apiClient->setConfigs($configs);
    }

    /**
     * Set Tokens
     *
     * @param string $accessToken
     * @param string $refreshToken
     * @return void
     */
    public function setTokens(string $accessToken, string $refreshToken)
    {
        $this->apiClient->setTokenManager($accessToken, $refreshToken);
    }

    /**
     * Get Access Token
     *
     * @return void
     */
    public function getAccessToken()
    {
        return $this->apiClient->getTokenManager()->getAccessToken();
    }

    /**
     * Get Refresh Token
     *
     * @return void
     */
    public function getRefreshToken()
    {
        return $this->apiClient->getTokenManager()->getRefreshToken();
    }

    /**
     * Start Debug
     *
     * @return Moloni
     */
    public function startDebug()
    {
        $this->apiClient->setDebug(true);
        return $this;
    }

    /**
     * Stop Debug
     *
     * @return Moloni
     */
    public function stopDebug()
    {
        $this->apiClient->setDebug(false);
        return $this;
    }

    /**
     * Start Validate
     *
     * @return Moloni
     */
    public function startValidate()
    {
        $this->apiClient->setValidate(true);
        return $this;
    }

    /**
     * Stop Validate
     *
     * @return Moloni
     */
    public function stopValidate()
    {
        $this->apiClient->setValidate(false);
        return $this;
    }

    // AUTH

    /**
     * Authorize API
     *
     * @return mixed
     */
    public function authorize()
    {
        return $this->apiClient->authorize();
    }

    /**
     * Grant By Password API
     *
     * @return mixed
     */
    public function grantByPassword()
    {
        return $this->apiClient->grantByPassword();
    }

    /**
     * Grant By Auth Code API
     *
     * @return mixed
     */
    public function grantByAuthCode()
    {
        return $this->apiClient->grantByAuthCode();
    }

    /**
     * Grant By Refresh Token API
     *
     * @return mixed
     */
    public function grantByRefreshToken()
    {
        return $this->apiClient->grantByRefreshToken();
    }

    // ACCOUNT AND PROFILE

    /**
     * My Profile API
     *
     * @return MyProfile
     */
    public function myProfile(): MyProfile
    {
        return new MyProfile($this->apiClient);
    }

    // COMPANY

    /**
     * Company API
     *
     * @return Company
     */
    public function company(): Company
    {
        return new Company($this->apiClient);
    }

    /**
     * Subscription API
     *
     * @return Subscription
     */
    public function subscription(): Subscription
    {
        return new Subscription($this->apiClient);
    }

    /**
     * Users API
     *
     * @return Users
     */
    public function users(): Users
    {
        return new Users($this->apiClient);
    }

    // DOCUMENTS

    /**
     * Bills Of Landing API
     *
     * @return BillsOfLanding
     */
    public function billsOfLanding(): BillsOfLanding
    {
        return new BillsOfLanding($this->apiClient);
    }

    /**
     * Credit Notes API
     *
     * @return CreditNotes
     */
    public function creditNotes(): CreditNotes
    {
        return new CreditNotes($this->apiClient);
    }

    /**
     * Customer Return Notes API
     *
     * @return CustomerReturnNotes
     */
    public function customerReturnNotes(): CustomerReturnNotes
    {
        return new CustomerReturnNotes($this->apiClient);
    }

    /**
     * Debit Notes API
     *
     * @return DebitNotes
     */
    public function debitNotes(): DebitNotes
    {
        return new DebitNotes($this->apiClient);
    }

    /**
     * Delivery Notes API
     *
     * @return DeliveryNotes
     */
    public function deliveryNotes(): DeliveryNotes
    {
        return new DeliveryNotes($this->apiClient);
    }

    /**
     * Documents API
     *
     * @return Documents
     */
    public function documents(): Documents
    {
        return new Documents($this->apiClient);
    }

    /**
     * Estimates API
     *
     * @return Estimates
     */
    public function estimates(): Estimates
    {
        return new Estimates($this->apiClient);
    }

    /**
     * Global Guides API
     *
     * @return GlobalGuides
     */
    public function globalGuides(): GlobalGuides
    {
        return new GlobalGuides($this->apiClient);
    }

    /**
     * Internal Documents API
     *
     * @return InternalDocuments
     */
    public function internalDocuments(): InternalDocuments
    {
        return new InternalDocuments($this->apiClient);
    }

    /**
     * Invoice Receipts API
     *
     * @return InvoiceReceipts
     */
    public function invoiceReceipts(): InvoiceReceipts
    {
        return new InvoiceReceipts($this->apiClient);
    }

    /**
     * Invoices API
     *
     * @return Invoices
     */
    public function invoices(): Invoices
    {
        return new Invoices($this->apiClient);
    }

    /**
     * Own Assets Movement Guides API
     *
     * @return OwnAssetsMovementGuides
     */
    public function ownAssetsMovementGuides(): OwnAssetsMovementGuides
    {
        return new OwnAssetsMovementGuides($this->apiClient);
    }

    /**
     * Payment Returns API
     *
     * @return PaymentReturns
     */
    public function paymentReturns(): PaymentReturns
    {
        return new PaymentReturns($this->apiClient);
    }

    /**
     * Purchase Order API
     *
     * @return PurchaseOrder
     */
    public function purchaseOrder(): PurchaseOrder
    {
        return new PurchaseOrder($this->apiClient);
    }

    /**
     * Receipts API
     *
     * @return Receipts
     */
    public function receipts(): Receipts
    {
        return new Receipts($this->apiClient);
    }

    /**
     * Simplified Invoices API
     *
     * @return SimplifiedInvoices
     */
    public function simplifiedInvoices(): SimplifiedInvoices
    {
        return new SimplifiedInvoices($this->apiClient);
    }

    /**
     * Supplier Credit Notes API
     *
     * @return SupplierCreditNotes
     */
    public function supplierCreditNotes(): SupplierCreditNotes
    {
        return new SupplierCreditNotes($this->apiClient);
    }

    /**
     * Supplier Debit Notes API
     *
     * @return SupplierDebitNotes
     */
    public function supplierDebitNotes(): SupplierDebitNotes
    {
        return new SupplierDebitNotes($this->apiClient);
    }

    /**
     * Supplier Invoices API
     *
     * @return SupplierInvoices
     */
    public function supplierInvoices(): SupplierInvoices
    {
        return new SupplierInvoices($this->apiClient);
    }

    /**
     * Supplier Purchase Order API
     *
     * @return SupplierPurchaseOrder
     */
    public function supplierPurchaseOrder(): SupplierPurchaseOrder
    {
        return new SupplierPurchaseOrder($this->apiClient);
    }

    /**
     * Supplier Receipts API
     *
     * @return SupplierReceipts
     */
    public function supplierReceipts(): SupplierReceipts
    {
        return new SupplierReceipts($this->apiClient);
    }

    /**
     * Supplier Return Notes API
     *
     * @return SupplierReturnNotes
     */
    public function supplierReturnNotes(): SupplierReturnNotes
    {
        return new SupplierReturnNotes($this->apiClient);
    }

    /**
     * Supplier Simplified Invoices API
     *
     * @return SupplierSimplifiedInvoices
     */
    public function supplierSimplifiedInvoices(): SupplierSimplifiedInvoices
    {
        return new SupplierSimplifiedInvoices($this->apiClient);
    }

    /**
     * Supplier Warranty Requests API
     *
     * @return SupplierWarrantyRequests
     */
    public function supplierWarrantyRequests(): SupplierWarrantyRequests
    {
        return new SupplierWarrantyRequests($this->apiClient);
    }

    /**
     * Warranty API
     *
     * @return WayBills
     */
    public function wayBills(): WayBills
    {
        return new Waybills($this->apiClient);
    }

    // ENTITIES

    /**
     * Customer Alternate Addresses API
     *
     * @return CustomerAlternateAddresses
     */
    public function customerAlternateAddresses(): CustomerAlternateAddresses
    {
        return new CustomerAlternateAddresses($this->apiClient);
    }

    /**
     * Customers API
     *
     * @return Customers
     */
    public function customers(): Customers
    {
        return new Customers($this->apiClient);
    }

    /**
     * Salesman API
     *
     * @return Salesman
     */
    public function salesman(): Salesman
    {
        return new Salesman($this->apiClient);
    }

    /**
     * Suppliers API
     *
     * @return Suppliers
     */
    public function suppliers(): Suppliers
    {
        return new Suppliers($this->apiClient);
    }

    // GLOBAL DATA

    /**
     * Countries API
     *
     * @return Countries
     */
    public function countries(): Countries
    {
        return new Countries($this->apiClient);
    }

    /**
     * Currencies API
     *
     * @return Currencies
     */
    public function currencies(): Currencies
    {
        return new Currencies($this->apiClient);
    }

    /**
     * Currency Exchange API
     *
     * @return CurrencyExchange
     */
    public function currencyExchange(): CurrencyExchange
    {
        return new CurrencyExchange($this->apiClient);
    }

    /**
     * Document Models API
     *
     * @return DocumentModels
     */
    public function documentModels(): DocumentModels
    {
        return new DocumentModels($this->apiClient);
    }

    /**
     * Fiscal Zones API
     *
     * @return FiscalZones
     */
    public function fiscalZones(): FiscalZones
    {
        return new FiscalZones($this->apiClient);
    }

    /**
     * Languages API
     *
     * @return Languages
     */
    public function languages(): Languages
    {
        return new Languages($this->apiClient);
    }

    /**
     * Multibanco Gateways API
     *
     * @return MultibancoGateways
     */
    public function multibancoGateways(): MultibancoGateways
    {
        return new MultibancoGateways($this->apiClient);
    }

    /**
     * Tax Exemptions API
     *
     * @return TaxExemptions
     */
    public function taxExemptions(): TaxExemptions
    {
        return new TaxExemptions($this->apiClient);
    }

    // PRODUCTS

    /**
     * Price Classes API
     *
     * @return PriceClasses
     */
    public function priceClasses(): PriceClasses
    {
        return new PriceClasses($this->apiClient);
    }

    /**
     * Product Categories API
     *
     * @return ProductCategories
     */
    public function productCategories(): ProductCategories
    {
        return new ProductCategories($this->apiClient);
    }

    /**
     * Products API
     *
     * @return Products
     */
    public function products(): Products
    {
        return new Products($this->apiClient);
    }

    /**
     * Product Stocks API
     *
     * @return ProductStocks
     */
    public function productStocks(): ProductStocks
    {
        return new ProductStocks($this->apiClient);
    }

    // SETTINGS

    /**
     * Bank Account API
     *
     * @return BankAccounts
     */
    public function bankAccount(): BankAccounts
    {
        return new BankAccounts($this->apiClient);
    }

    /**
     * Deductions API
     *
     * @return Deductions
     */
    public function deductions(): Deductions
    {
        return new Deductions($this->apiClient);
    }

    /**
     * Document Sets API
     *
     * @return DocumentSets
     */
    public function documentSets(): DocumentSets
    {
        return new DocumentSets($this->apiClient);
    }

    /**
     * Economic Activity Classification Codes API
     *
     * @return EconomicActivityClassificationCodes
     */
    public function economicActivityClassificationCodes(): EconomicActivityClassificationCodes
    {
        return new EconomicActivityClassificationCodes($this->apiClient);
    }

    /**
     * Identification Templates API
     *
     * @return IdentificationTemplates
     */
    public function identificationTemplates(): IdentificationTemplates
    {
        return new IdentificationTemplates($this->apiClient);
    }

    /**
     * Maturity Dates API
     *
     * @return MaturityDates
     */
    public function maturityDates(): MaturityDates
    {
        return new MaturityDates($this->apiClient);
    }

    /**
     * Measurement Units API
     *
     * @return MeasurementUnits
     */
    public function measurementUnits(): MeasurementUnits
    {
        return new MeasurementUnits($this->apiClient);
    }

    /**
     * Payment Methods API
     *
     * @return PaymentMethods
     */
    public function paymentMethods(): PaymentMethods
    {
        return new PaymentMethods($this->apiClient);
    }

    /**
     * Product Properties API
     *
     * @return ProductProperties
     */
    public function ProductProperties(): ProductProperties
    {
        return new ProductProperties($this->apiClient);
    }

    /**
     * Tax And Fees API
     *
     * @return TaxAndFees
     */
    public function taxAndFees(): TaxAndFees
    {
        return new TaxAndFees($this->apiClient);
    }

    /**
     * Vehicles API
     *
     * @return Vehicles
     */
    public function vehicles(): Vehicles
    {
        return new Vehicles($this->apiClient);
    }

    /**
     * Warehouses API
     *
     * @return Warehouses
     */
    public function warehouses(): Warehouses
    {
        return new Warehouses($this->apiClient);
    }
}