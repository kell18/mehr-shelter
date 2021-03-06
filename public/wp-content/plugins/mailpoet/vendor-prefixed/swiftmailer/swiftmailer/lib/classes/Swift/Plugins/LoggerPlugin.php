<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Plugins_LoggerPlugin implements Swift_Events_CommandListener, Swift_Events_ResponseListener, Swift_Events_TransportChangeListener, Swift_Events_TransportExceptionListener, Swift_Plugins_Logger
{
 private $logger;
 public function __construct(Swift_Plugins_Logger $logger)
 {
 $this->logger = $logger;
 }
 public function add($entry)
 {
 $this->logger->add($entry);
 }
 public function clear()
 {
 $this->logger->clear();
 }
 public function dump()
 {
 return $this->logger->dump();
 }
 public function commandSent(Swift_Events_CommandEvent $evt)
 {
 $command = $evt->getCommand();
 $this->logger->add(\sprintf('>> %s', $command));
 }
 public function responseReceived(Swift_Events_ResponseEvent $evt)
 {
 $response = $evt->getResponse();
 $this->logger->add(\sprintf('<< %s', $response));
 }
 public function beforeTransportStarted(Swift_Events_TransportChangeEvent $evt)
 {
 $transportName = \get_class($evt->getSource());
 $this->logger->add(\sprintf('++ Starting %s', $transportName));
 }
 public function transportStarted(Swift_Events_TransportChangeEvent $evt)
 {
 $transportName = \get_class($evt->getSource());
 $this->logger->add(\sprintf('++ %s started', $transportName));
 }
 public function beforeTransportStopped(Swift_Events_TransportChangeEvent $evt)
 {
 $transportName = \get_class($evt->getSource());
 $this->logger->add(\sprintf('++ Stopping %s', $transportName));
 }
 public function transportStopped(Swift_Events_TransportChangeEvent $evt)
 {
 $transportName = \get_class($evt->getSource());
 $this->logger->add(\sprintf('++ %s stopped', $transportName));
 }
 public function exceptionThrown(Swift_Events_TransportExceptionEvent $evt)
 {
 $e = $evt->getException();
 $message = $e->getMessage();
 $code = $e->getCode();
 $this->logger->add(\sprintf('!! %s (code: %s)', $message, $code));
 $message .= \PHP_EOL;
 $message .= 'Log data:' . \PHP_EOL;
 $message .= $this->logger->dump();
 $evt->cancelBubble();
 throw new Swift_TransportException($message, $code, $e->getPrevious());
 }
}
